<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetLanguages;
use Laminas\Http\Request;


/**
 * Class LanguageReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetLanguagesReq extends ApiRequest
{
    /**
     * LanguageReq constructor.
     * @param ApiUri $baseUri
     * @param GetLanguages $getLanguagesReq
     */
    public function __construct(ApiUri $baseUri, GetLanguages $getLanguagesReq)
    {
        parent::__construct($baseUri, self::GET_LANGUAGES);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getLanguagesReq);
    }
}