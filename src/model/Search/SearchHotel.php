<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/4/2015
 * Time: 8:43 PM
 */
namespace Webbeds\HotelApiSdk\Model\Search;

use Webbeds\HotelApiSdk\Model\ApiModel;

/**
 * Class SearchHotels
 * @package Webbeds\HotelApiSdk\Model
 * @property string userName User Name to use webBeds API
 * @property string password Password to use webBeds API
 */
class SearchHotel extends ApiModel
{
    /**
     * SearchHotels constructor.
     * @property string userName User Name to use webBeds API
     * @property string password Password to use webBeds API
     */
    public function __construct(array $data=null)
    {
        $this->validFields =
            [
                "hotelId" => "string",
                "destinationId" => "string",
                "resortId" => "string",
                "transfer" => "string",
                "roomTypes" => "array",
                "notes" => "string",
                "distance" => "string",
                "codes" => "string"
            ];

        if ($data !== null)
        {
            $this->fields = $data;
        }
    }
}