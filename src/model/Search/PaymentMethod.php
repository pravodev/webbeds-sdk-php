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
 * Class PaymentMethods
 * @package Webbeds\HotelApiSdk\Model
 * @property string userName User Name to use webBeds API
 * @property string password Password to use webBeds API
 */
class PaymentMethod extends ApiModel
{
    /**
     * PaymentMethods constructor.
     * @property string userName User Name to use webBeds API
     * @property string password Password to use webBeds API
     */
    public function __construct(array $data=null)
    {
        $this->validFields =
            [   
                "id" => "integer",
                "name" => "string"
            ];
             
            //print_r($data);
            if ($data !== null)
            {
                $this->fields['id'] = $data{'@attributes'}['id'];
                $this->fields['name'] = empty($data{'@attributes'}['name']) ? '': $data{'@attributes'}['name'];
                // TODO: namepsace: xsi:type="StaticPaymentMethod"; problem with accessing namespace
                
            }
    }
}