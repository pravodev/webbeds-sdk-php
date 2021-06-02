<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:09 PM
 */
namespace Webbeds\HotelApiSdk\Helpers\Book;

use Webbeds\HotelApiSdk\Helpers\ApiHelper;
/**
 * Class CancelBooking
 * @package Webbeds\HotelApiSdk\Helpers
*/
class CancelBooking extends ApiHelper
{
    /**
     * CancelBooking constructor.
     */
    public function __construct()
    {
        $this->validFields = [
            "userName" => "string",
            "password" => "string",
            "language" => "string",
            "bookingID" => "string"
        ];
    }
}