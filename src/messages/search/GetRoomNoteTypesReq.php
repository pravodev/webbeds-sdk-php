<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetRoomNoteTypes;
use Laminas\Http\Request;


/**
 * Class GetRoomNoteTypeReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetRoomNoteTypesReq extends ApiRequest
{
    /**
     * GetRoomNoteTypesReq constructor.
     * @param ApiUri $baseUri
     * @param GetRoomNoteTypes $getRoomNoteTypesReq
     */
    public function __construct(ApiUri $baseUri, GetRoomNoteTypes $getRoomNoteTypesReq)
    {
        parent::__construct($baseUri, self::GET_ROOM_NOTE_TYPES);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getRoomNoteTypesReq);
    }
}