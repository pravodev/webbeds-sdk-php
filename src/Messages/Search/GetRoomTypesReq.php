<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetRoomTypes;
use Laminas\Http\Request;


/**
 * Class GetRoomTypeReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetRoomTypesReq extends ApiRequest
{
    /**
     * GetRoomTypesReq constructor.
     * @param ApiUri $baseUri
     * @param GetRoomTypes $getRoomTypesReq
     */
    public function __construct(ApiUri $baseUri, GetRoomTypes $getRoomTypesReq)
    {
        parent::__construct($baseUri, self::GET_ROOM_TYPES);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getRoomTypesReq);
    }
}