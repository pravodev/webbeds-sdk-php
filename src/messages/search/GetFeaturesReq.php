<?php
/**
 * User: Hamilton
 * Date: 12/12/2018
 * Time: 01:12 PM
 */
namespace Webbeds\HotelApiSdk\Messages\Search;

use Webbeds\HotelApiSdk\Messages\BaseClass\ApiRequest;
use Webbeds\HotelApiSdk\Types\ApiUri;
use Webbeds\HotelApiSdk\Helpers\Search\GetFeatures;
use Laminas\Http\Request;


/**
 * Class GetFeatureReq
 * @package Webbeds\HotelApiSdk\Messages
 */
class GetFeaturesReq extends ApiRequest
{
    /**
     * GetFeaturesReq constructor.
     * @param ApiUri $baseUri
     * @param GetFeatures $getFeaturesReq
     */
    public function __construct(ApiUri $baseUri, GetFeatures $getFeaturesReq)
    {
        parent::__construct($baseUri, self::GET_FEATURES);
        $this->request->setMethod(Request::METHOD_POST);
        $this->setDataRequest($getFeaturesReq);
    }
}