<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Book;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Book\CancelBooking;
use Laminas\Http\Request;


/**
 * Class LanguageReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class CancelBookingReq extends ApiRequest
{
    /**
     * LanguageReq constructor.
     * @param ApiUri $baseUri
     * @param CancelBooking $CancelBookingReq
     */
    public function __construct(ApiUri $baseUri, CancelBooking $cancelBookingReq)
    {
        parent::__construct($baseUri, self::CANCEL_BOOKING);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($cancelBookingReq);
    }
}