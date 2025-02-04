<?php

/**
 * #%L
 * hotel-api-sdk
 * %%
 * Copyright (C) 2018 Hamilton
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

use Webbeds\HotelApiSdk\HotelApiClient;
use Webbeds\HotelApiSdk\Types\ApiVersion;
use Webbeds\HotelApiSdk\Types\ApiVersions;
use Webbeds\HotelApiSdk\Messages\Search\GetDestinationsResp;
use Webbeds\HotelApiSdk\Model\search\Destination;
use PHPUnit\Framework\TestCase;

class GetDestinationsTest extends TestCase
{
    /**
     * @var HotelApiClient
     */
    private $apiClient;
    /**
     * @var string userName User Name to use webBeds API
     */
    private $userName;
    /**
     * @var string password Password to use webBeds API
     */
    private $password;
    /**
     * @var string language language to retrieve your data
     */
    private $language;
    /**
     * @var string destinationCode DestinationCode parameter
     */
    private $destinationCode;
    /**
     * @var string sortBy SortBy to sort your data
     */
    private $sortBy;
    /**
     * @var string sortOrder sortOrder to order your data
     */
    private $sortOrder;
    /**
     * @var string exactDestinationMatch ExactDestinationMatch to specify a precise destination code match
     */
    private $exactDestinationMatch;
    /**
     * @var string lib search api or book api
     */
    private $lib;
    /**
     * @var bool lib using static or nonStatic, default to true
     */
    private $nonStatic;

    protected function setUp()
    {
        $this->lib = 'search';
        $this->$nonStatic = true;
        $reader = new Zend\Config\Reader\Ini();
        $commonConfig   = $reader->fromFile(__DIR__ . '/config/Common.ini');
        $currentEnvironment = $commonConfig["environment"]? $commonConfig["environment"]: "DEFAULT";
        $environmentConfig   = $reader->fromFile(__DIR__ . '/config/Environment.' . strtoupper($currentEnvironment) . '.ini');
        $cfgUri = $commonConfig["url"];
        $cfgApi = $environmentConfig["apiclient"];
        $this->userName = $cfgApi["userName"];
        $this->password = $cfgApi["password"];
        $this->apiClient = new HotelApiClient($cfgUri[$this->lib],
            $cfgApi["userName"],
            $cfgApi["password"],
            new ApiVersion(ApiVersions::V1_0),
            $this->lib,
            $this->$nonStatic,
            $cfgUri["timeout"],
            null);

        $this->language = 'en';
        $this->destinationCode ='TPE';
        $this->sortBy = '';
        $this->sortOrder = '';
        $this->exactDestinationMatch = '';
    }

    /**
     * API Destination Method test
     */
    public function testDestinationsReq()
    {
        $reqData = new \Webbeds\HotelApiSdk\helpers\search\GetDestinations();
        
        $reqData->userName = $this->userName;
        $reqData->password = $this->password;
        $reqData->language = $this->language;
        $reqData->destinationCode = $this->destinationCode;
        $reqData->sortBy = $this->sortBy;
        $reqData->sortOrder = $this->sortOrder;
        $reqData->exactDestinationMatch = $this->exactDestinationMatch;

        $resp = $this->apiClient->GetDestinations($reqData);
        
        $this->assertNotEmpty($resp);
        return $resp;
    }

    /**
     * Testing GetDestinationsResp results of GetDestinations method
     *
     * @depends testDestinationsReq
     */
    public function testDestinationXMLResp(SimpleXMLElement $xmlResp)
    {
        //print_r( $this->apiClient->ConvertXMLToArray($xmlResp) );
        //print_r( $this->apiClient->ConvertXMLToNative($resp, "GetDestinations") );
        //print_r($xmlResp);

        $this->assertEquals((string)$xmlResp->Destinations->Destination[0]->DestinationName, "Hsinchu");
        $native = $this->apiClient->ConvertXMLToNative($xmlResp, "GetDestinations");

        $this->assertEquals(get_class($native), "Webbeds\\HotelApiSdk\\Messages\\".ucwords($this->lib)."\\GetDestinationsResp");
        return $native;
    }

    /**
     * Testing GetDestinationsResp results of GetDestinations method
     *
     * @depends testDestinationXMLResp
     */
    public function testDestinationResp(GetDestinationsResp $getDestinationsResp)
    {
        // Check is response is empty or not
        $this->assertFalse($getDestinationsResp->isEmpty(), "Response is empty!");
        $this->assertEquals($getDestinationsResp->iterator()->current()->destinationName, "Hsinchu");
        
        
        echo "  ".PHP_EOL;
        foreach ($getDestinationsResp->iterator() as $destination_id => $destinationData) {
            echo $destinationData->destination_id . ', '.$destinationData->destinationCode . ', '.$destinationData->destinationCode2 . ', '.$destinationData->destinationCode3 . ', '.$destinationData->destinationCode4. ', ';
            echo $destinationData->destinationName . ', ' .$destinationData->countryId  . ', ' .$destinationData->countryName  . ', ' .$destinationData->countryCode  . ', ' .$destinationData->timeZone .PHP_EOL;
        }
    }
}