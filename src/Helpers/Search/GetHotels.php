<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:09 PM
 */
namespace Webbeds\HotelApiSdk\Helpers\Search;

use Webbeds\HotelApiSdk\Helpers\ApiHelper;
/**
 * Class GetHotels
 * @package Webbeds\HotelApiSdk\Helpers
*/
class GetHotels extends ApiHelper
{
    /**
     * GetHotels constructor.
     */
    public function __construct()
    {
        $this->validFields = [
            "userName" => "string",
            "password" => "string",
            "language" => "string",
            "destination" => "string",
            "hotelIDs" => "string",
            "resortIDs" => "string",
            "accommodationTypes" => "string",
            "sortBy" => "string",
            "sortOrder" => "string",
            "exactDestinationMatch" => "string"
        ];
    }
}