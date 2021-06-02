<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetHotels;
use Laminas\Http\Request;


/**
 * Class GetHotelReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetHotelsReq extends ApiRequest
{
    /**
     * GetHotelsReq constructor.
     * @param ApiUri $baseUri
     * @param GetHotels $getHotelsReq
     */
    public function __construct(ApiUri $baseUri, GetHotels $getHotelsReq)
    {
        parent::__construct($baseUri, self::GET_STATIC_HOTELS_AND_ROOMS);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getHotelsReq);
    }
}