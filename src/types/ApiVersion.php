<?php
/**
 * User: Hamilton
 * Date: 12/11/2018
 * Time: 11:15 AM
 */
namespace Webbeds\HotelApiSdk\Types;
/**
 * Interface ApiVersions. Define all available versions
 * @package Webbeds\HotelApiSdk\Types
 */
interface ApiVersions {

    const V1_0="1";//Default version
    const V1_2="1.2";//Future release
    public function __construct($version);
    public function getVersion();
}
/**
 * Class ApiVersion. Simple class define API version
 * @package Webbeds\HotelApiSdk\Types
 */
class ApiVersion implements ApiVersions
{
    /**
     * @var string contains string of version
     */
    private $version;
    /**
     * ApiVersion constructor.
     * @param $version
     */
    public function __construct($version)
    {
        $this->version = $version;
    }
    /**
     * Return version string of version
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }
}