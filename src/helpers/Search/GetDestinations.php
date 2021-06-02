<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:09 PM
 */
namespace Webbeds\HotelApiSdk\Helpers\Search;

use Webbeds\HotelApiSdk\Helpers\ApiHelper;
/**
 * Class GetDestinations
 * @package Webbeds\HotelApiSdk\Helpers
*/
class GetDestinations extends ApiHelper
{
    /**
     * GetDestinations constructor.
     */
    public function __construct()
    {
        $this->validFields = [
            "userName" => "string",
            "password" => "string",
            "language" => "string",
            "destinationCode" => "string",
            "sortBy" => "string",
            "sortOrder" => "string",
            "exactDestinationMatch" => "string"
        ];
    }
}