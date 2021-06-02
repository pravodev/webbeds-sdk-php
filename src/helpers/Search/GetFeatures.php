<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:09 PM
 */
namespace Webbeds\HotelApiSdk\Helpers\Search;

use Webbeds\HotelApiSdk\Helpers\ApiHelper;
/**
 * Class GetFeatures
 * @package Webbeds\HotelApiSdk\Helpers
*/
class GetFeatures extends ApiHelper
{
    /**
     * GetFeatures constructor.
     */
    public function __construct()
    {
        $this->validFields = [
            "userName" => "string",
            "password" => "string",
            "language" => "string"
        ];
    }
}