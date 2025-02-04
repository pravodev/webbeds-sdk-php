<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 1:33 AM
 */
namespace Webbeds\HotelApiSdk\Model\Search;

use Webbeds\HotelApiSdk\Model\ApiModel;

/**
 * Class GetHotelRoomTypes
 * @package Webbeds\HotelApiSdk\Model
 * @property integer total Total number of GetHotelRoomTypes
 */
class GetHotelRoomTypes extends ApiModel
{
    public function __construct(array $data = null)
    {
        $this->validFields = [
            "roomtype" => "array",
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }
    /**
     * @return GetHotelRoomtypeIterator For iterate GetHotelRoomtypes list
     */
    public function iterator()
    {
        if (isset($this->fields['roomtype']) )
        {
            // make sure there is more than one item
            if (array_key_exists("0", $this->fields['roomtype'])) {
                return new GetHotelRoomTypeIterator($this->fields['roomtype']);
            } else {
                $item = $this->fields['roomtype'];
                $this->fields['roomtype'] = [];
                array_push($this->fields['roomtype'], $item);
                return new GetHotelRoomtypeIterator($this->fields['roomtype']);
            }
            
        }
            
        return new GetHotelRoomtypeIterator([]);
    }
}