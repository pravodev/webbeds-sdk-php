<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Book;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Book\PreBookV2;
use Laminas\Http\Request;


/**
 * Class LanguageReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class PreBookV2Req extends ApiRequest
{
    /**
     * LanguageReq constructor.
     * @param ApiUri $baseUri
     * @param PreBookV2 $PreBookV2Req
     */
    public function __construct(ApiUri $baseUri, PreBookV2 $preBookV2Req)
    {
        parent::__construct($baseUri, self::PREBOOKV2);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($preBookV2Req);
    }
}