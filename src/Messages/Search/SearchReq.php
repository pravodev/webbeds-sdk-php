<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\Search;
use Laminas\Http\Request;


/**
 * Class LanguageReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class SearchReq extends ApiRequest
{
    /**
     * LanguageReq constructor.
     * @param ApiUri $baseUri
     * @param Search $SearchReq
     */
    public function __construct(ApiUri $baseUri, Search $searchReq)
    {
        parent::__construct($baseUri, self::SEARCH);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($searchReq);
    }
}