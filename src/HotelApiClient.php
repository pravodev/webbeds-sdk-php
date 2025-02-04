<?php

/**
 * #%L
 * hotel-api-sdk
 * %%
 * Copyright (C) 2018-2019 Hamilton Wang
 * %%
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 2.1 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Lesser Public License for more details.
 *
 * You should have received a copy of the GNU General Lesser Public
 * License along with this program.  If not, see
 * <http://www.gnu.org/licenses/lgpl-2.1.html>.
 * #L%
 */

namespace Webbeds\HotelApiSdk;

use Webbeds\HotelApiSdk\Model\AuditData;
use Webbeds\HotelApiSdk\Types\ApiVersion;
use Webbeds\HotelApiSdk\Types\ApiVersions;
use Webbeds\HotelApiSdk\Types\HotelSDKException;
use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Utility\UtilityHelper;

use Laminas\Http\Client;
use Laminas\Http\Request;
use Laminas\Http\Response;
use Laminas\Uri\UriFactory;

class HotelApiClient
{
    /**
     * @var apiUri Well formatted URI of service for Book
     */
    private $apiUri;
    /**
     * @var string Stores locally client password 
     */
    private $password;

    /**
     * @var string Stores locally client api key
     */
    private $userName;

    /**
     * @var Client HTTPClient object
     */
    private $httpClient;

    /**
     * @var Request Last sent request
     */
    private $lastRequest;
    /**
     * @var Response Last sent request
     */
    private $lastResponse;
    /**
     * @var string Last SDK Method
     */
    private $lastSdkMethod;
    /**
     * @var string lib used search or book
     */
    private $lib;

    /**
     * HotelApiClient Constructor they initialize SDK Client.
     * @param string $url Base URL of hotel-api service.
     * @param string $userName Client userName
     * @param string $password
     * @param ApiVersion $version Version of Hotel API Interface
     * @param int $timeout HTTP Client timeout
     * @param string $adapter Customize adapter for http request
     */
    public function __construct($url, $userName, $password, ApiVersion $version, $lib, $nonStatic = true, $timeout=30, $adapter=null)
    {
        $this->lastRequest = null;
        $this->userName = trim($userName);
        $this->password = trim($password);
        $this->httpClient = new Client();
        $this->lib = trim($lib);
        if($adapter!=null) {
            $this->httpClient->setOptions([
            		"adapter" => $adapter,
            		"timeout" => $timeout
            ]);
        }else{
            $this->httpClient->setOptions([
            		"timeout" => $timeout
            ]);
        }
        UriFactory::registerScheme("https","Webbeds\\HotelApiSdk\\Types\\ApiUri");
        $this->apiUri = UriFactory::factory($url);
        $this->apiUri->prepare($version, $lib, $nonStatic);
    }

    /**
     * @param $sdkMethod string Method request name.
     * @param $args array only specify a ApiHelper class type for encapsulate request arguments
     * @return ApiResponse Class of response. Each call type returns response class: For example BookingReq returns BookingResp
     * @throws HotelSDKException Specific exception of call
     */
    public function __call($sdkMethod, array $args=null)
    {
        $this->lastSdkMethod = $sdkMethod;
        $sdkClassReq = "Webbeds\\HotelApiSdk\\Messages\\".ucwords($this->lib)."\\".$sdkMethod."Req";
        $sdkClassResp = "Webbeds\\HotelApiSdk\\Messages\\".ucwords($this->lib)."\\".$sdkMethod."Resp";
        if (!class_exists($sdkClassReq) && !class_exists($sdkClassResp)){
            throw new HotelSDKException("$this->lib\\$sdkClassReq or $this->lib\\$sdkClassResp not implemented in SDK");
        }
        //if($sdkClassReq == "Webbeds\\HotelApiSdk\\Messages\\BookingConfirmReq"){
        //	$req = new $sdkClassReq($this->apiUri, $args[0]);
        //}else{
	        if ($args !== null && count($args) > 0){
	            $req = new $sdkClassReq($this->apiUri, $args[0]);
	        } else {
	        	$req = new $sdkClassReq($this->apiUri);
            }
            
            //echo "req type: " . get_class($req). "\n";
        //}
        //return new $sdkClassResp($this->callApi($req));
        return $this->callApi($req);
    }

    /**
     * Generic API Call, this is a internal used method for sending all requests to RESTful webservice 
     * XML response and transforms to PHP-Array object.
     * @param ApiRequest $request API Abstract request helper for construct request
     * @return Object SimpleXMLElement Object
     * @throws HotelSDKException Calling exception, can capture remote server auditdata if exists.
     */
    private function callApi(ApiRequest $request)
    {
        try {
            $this->lastRequest = $request->prepare($this->userName, $this->password, $this->lib);
            $response = $this->httpClient->send($this->lastRequest);
            //$response = $this->httpClient->send();
            $this->lastResponse = $response;
        } catch (\Exception $e) {
            throw new HotelSDKException("Error accessing API: " . $e->getMessage());
        }
       // echo '--> getBody:' . $response->getBody();
        if ($response->getStatusCode() !== 200) {
           $auditData = null; $message=''; $errorResponse = null;
           if ($response->getBody() !== null) {
               try {
                   $root = $this->lastSdkMethod . "Result";
                   $errorResponse = simplexml_load_string( $response->getBody() );
                   //$auditData = new AuditData($errorResponse["auditData"]);
                   $message =$errorResponse[$root]["Error"]["ErrorType"].' '.$errorResponse[$root]["Error"]["Message"];
               } catch (\Exception $e) {
                   throw new HotelSDKException($response->getReasonPhrase().': '.$response->getBody());
               }
           }
            throw new HotelSDKException($response->getReasonPhrase().': '.$message, $auditData);
        }
        $resp = simplexml_load_string( mb_convert_encoding($response->getBody(),'UTF-8'));
        //print_r( '--> getBody simplexml_load_string:' . $json);
        return $resp;
    }

    /**
     * @return array ConvertXMLToNative convert XML Object to Native format
     */
    public function ConvertXMLToNative($xml_string, $sdkMethod)
    {
        $sdkClassResp = "Webbeds\\HotelApiSdk\\Messages\\".ucwords($this->lib)."\\".$sdkMethod."Resp";
        //print_r($xml_string);
        $array = UtilityHelper::ConvertXMLToArray2($xml_string);

        return new $sdkClassResp($array);
    }
    
    /**
     * @return array ConvertSimpleXMLToArray convert XML Object to Native format
     */
    public function ConvertSimpleXMLToArray(\SimpleXMLElement $xml_string, $sdkMethod)
    {
        $sdkClassResp = "Webbeds\\HotelApiSdk\\Messages\\".ucwords($this->lib)."\\".$sdkMethod."Resp";
        //$data = UtilityHelper::XMLtoArray($xml_string);
        return new $sdkClassResp($xml_string);
    }

    /**
     * @return Request getLastRequest Returns entire raw request
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }

    /**
     * @return Response getLastResponse Returns entire raw response
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * @return Response getLastResponse Returns entire raw response
     */
    public function getLastSdkMethod()
    {
        return $this->lastSdkMethod;
    }
}