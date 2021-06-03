<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Book;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Book\Book;
use Laminas\Http\Request;


/**
 * Class LanguageReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class BookReq extends ApiRequest
{
    /**
     * LanguageReq constructor.
     * @param ApiUri $baseUri
     * @param Book $BookReq
     */
    public function __construct(ApiUri $baseUri, Book $bookReq)
    {
        parent::__construct($baseUri, self::BOOK);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($bookReq);
    }
}