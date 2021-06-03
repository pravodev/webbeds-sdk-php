<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetHotelNoteTypes;
use Laminas\Http\Request;


/**
 * Class GetHotelNoteTypeReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetHotelNoteTypesReq extends ApiRequest
{
    /**
     * GetHotelNoteTypesReq constructor.
     * @param ApiUri $baseUri
     * @param GetHotelNoteTypes $getHotelNoteTypesReq
     */
    public function __construct(ApiUri $baseUri, GetHotelNoteTypes $getHotelNoteTypesReq)
    {
        parent::__construct($baseUri, self::GET_HOTEL_NOTE_TYPES);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getHotelNoteTypesReq);
    }
}