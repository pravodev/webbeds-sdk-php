<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:09 PM
 */
namespace Webbeds\HotelApiSdk\Helpers\Search;

use Webbeds\HotelApiSdk\Helpers\ApiHelper;
/**
 * Class GetLanguages
 * @package Webbeds\HotelApiSdk\Helpers
*/
class GetLanguages extends ApiHelper
{
    /**
     * GetLanguages constructor.
     */
    public function __construct()
    {
        $this->validFields = [
            "userName" => "string",
            "password" => "string"
        ];
    }
}