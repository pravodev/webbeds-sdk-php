<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Book;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Book\GetBookingInfo;
use Laminas\Http\Request;


/**
 * Class LanguageReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetBookingInfoReq extends ApiRequest
{
    /**
     * LanguageReq constructor.
     * @param ApiUri $baseUri
     * @param GetBookingInfo $GetBookingInfoReq
     */
    public function __construct(ApiUri $baseUri, GetBookingInfo $getBookingInfoReq)
    {
        parent::__construct($baseUri, self::GET_BOOKING_INFORMATION);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getBookingInfoReq);
    }
}