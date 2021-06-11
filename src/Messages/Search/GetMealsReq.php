<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetMeals;
use Laminas\Http\Request;


/**
 * Class GetDestinationReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetMealsReq extends ApiRequest
{
    /**
     * GetMealsReq constructor.
     * @param ApiUri $baseUri
     * @param GetMeals $getMealsReq
     */
    public function __construct(ApiUri $baseUri, GetMeals $getMealsReq)
    {
        parent::__construct($baseUri, self::GET_MEALS);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getMealsReq);
    }
}