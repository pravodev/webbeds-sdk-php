<?php
/**
 * User: Hamilton
 * Date: 12/11/2018
 * Time: 11:15 AM
 */
namespace Webbeds\HotelApiSdk\Helpers;

use Webbeds\HotelApiSdk\Generic\DataContainer;
use Laminas\Json\Json;

abstract class ApiHelper extends DataContainer
{
    public function __toString()
    {
        return Json::encode($this->toArray());
    }
}