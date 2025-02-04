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
 * Class HotelNoteTypes
 * @package Webbeds\HotelApiSdk\Model
 * @property string userName User Name to use webBeds API
 * @property string password Password to use webBeds API
 */
class HotelNoteType extends ApiModel
{
    /**
     * HotelNoteTypes constructor.
     * @property string userName User Name to use webBeds API
     * @property string password Password to use webBeds API
     */
    public function __construct(string $id=null, string $text=null)
    {
        $this->validFields =
            ["id" => "string",
             "text" => "string"];
             
        if ($id !== null)
            $this->id = $id;

        if ($text !== null)
            $this->text = $text;
    }
}