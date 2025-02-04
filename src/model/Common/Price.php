<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/4/2015
 * Time: 8:43 PM
 */
namespace Webbeds\HotelApiSdk\Model\Common;

use Webbeds\HotelApiSdk\Model\ApiModel;

/**
 * Class Price
 * @package Webbeds\HotelApiSdk\Model
 * @property string userName User Name to use webBeds API
 * @property string password Password to use webBeds API
 */
class Price extends ApiModel
{
    /**
     * Prices constructor.
     * @property string userName User Name to use webBeds API
     * @property string password Password to use webBeds API
     */
    public function __construct(array $data=null)
    {
        $this->validFields =
            [
                "price" => "string",
                "currency" => "string",
                "paymentMethods" => "integer"
            ];

            if ($data !== null)
            {
                //print_r($data);
                $this->fields['price'] = $data['price'];
                $this->fields['currency'] = $data['currency'];
                $this->fields['paymentMethods'] = $data['paymentMethods'];
            }
    }
}