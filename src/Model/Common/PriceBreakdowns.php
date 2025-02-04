<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 1:33 AM
 */
namespace Webbeds\HotelApiSdk\Model\Common;

use Webbeds\HotelApiSdk\Model\ApiModel;

/**
 * Class PriceBreakdowns
 * @package Webbeds\HotelApiSdk\Model
 * @property integer total Total number of PriceBreakdowns
 */
class PriceBreakdowns extends ApiModel
{
    public function __construct(array $data = null)
    {
        $this->validFields = [
            "guest" => "array",
        ];

        if ($data !== null) {
            $this->fields = $data;
        }
    }
    /**
     * @return PriceBreakdownIterator For iterate PriceBreakdowns list
     */
    public function iterator()
    {
        if (isset($this->fields['guest']) )
        {
            $key = 0;
            // make sure there is more than one item
            if (array_key_exists("0", $this->fields['guest'])) {
                foreach ($this->fields['guest'] as &$guest) {
                    $guest['id'] = $key;
                    $key++;
                }
                //print_r($this->fields['guest']);
                return new PriceBreakdownIterator($this->fields['guest']);
            } else {
                $item = $this->fields['guest'];
                $item['id'] = $key;
                $this->fields['guest'] = [];
                array_push($this->fields['guest'], $item);
                return new PriceBreakdownIterator($this->fields['guest']);
            }
            
        }
            
        return new PriceBreakdownIterator([]);
    }
}