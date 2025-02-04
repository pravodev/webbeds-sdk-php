<?php
/**
 * Created by PhpStorm.
 * User: xortiz
 * Date: 07/09/2016
 * Time: 06:21 PM
 */
namespace Webbeds\HotelApiSdk\Model\Search;

use Webbeds\HotelApiSdk\Model\ApiModel;

class DistanceTypeIterator implements \Iterator
{
    private $distanceTypes, $position = 0;
    public function __construct(array $distanceTypes)
    {
        $this->distanceTypes = $distanceTypes;        
    }
    public function current()
    {
        $description = $this->distanceTypes[$this->position]['description'];
        $id = $this->distanceTypes[$this->position]['hotelDistanceTypeId'];
        return new DistanceType($id, $description);
    }
    public function next()
    {
        ++$this->position;
    }
    public function key()
    {
        return $this->distanceTypes[$this->position]['hotelDistanceTypeId'];
    }
    public function valid()
    {
        return ( $this->position < count($this->distanceTypes) );
    }
    public function rewind()
    {
        $this->position = 0;
    }
}