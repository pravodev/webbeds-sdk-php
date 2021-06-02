<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetTransferTypes;
use Laminas\Http\Request;


/**
 * Class GetTransferTypeReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetTransferTypesReq extends ApiRequest
{
    /**
     * GetTransferTypesReq constructor.
     * @param ApiUri $baseUri
     * @param GetTransferTypes $getTransferTypesReq
     */
    public function __construct(ApiUri $baseUri, GetTransferTypes $getTransferTypesReq)
    {
        parent::__construct($baseUri, self::GET_TRANSFER_TYPES);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getTransferTypesReq);
    }
}