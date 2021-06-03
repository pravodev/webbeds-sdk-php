<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetDestinations;
use Laminas\Http\Request;


/**
 * Class GetDestinationReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetDestinationsReq extends ApiRequest
{
    /**
     * GetDestinationsReq constructor.
     * @param ApiUri $baseUri
     * @param GetDestinations $getDestinationsReq
     */
    public function __construct(ApiUri $baseUri, GetDestinations $getDestinationsReq)
    {
        parent::__construct($baseUri, self::GET_DESTINATION);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getDestinationsReq);
    }
}