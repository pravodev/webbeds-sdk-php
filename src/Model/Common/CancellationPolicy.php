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
 * Class CancellationPolicy
 * @package Webbeds\HotelApiSdk\Model
 * @property string userName User Name to use webBeds API
 * @property string password Password to use webBeds API
 */
class CancellationPolicy extends ApiModel
{
    /**
     * CancellationPolicy constructor.
     * @property string userName User Name to use webBeds API
     * @property string password Password to use webBeds API
     */
    public function __construct(array $data=null)
    {
        $this->validFields =
            [   "deadline" => "integer",
                "percentage" => "integer",
                "text" => "string"
            ];
             
            if ($data !== null)
            {
                $this->fields['deadline'] = empty($data['deadline']) ? 0: $data['deadline'];
                $this->fields['percentage'] = empty($data['percentage']) ? 100: $data['percentage'];
                $this->fields['text'] = isset($data['text']) ? '': empty($data['text'])? '': $data['text'];

            }
    }
}