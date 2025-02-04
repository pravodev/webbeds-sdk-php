<?php
/**
 * User: Hamilton
 * Date: 12/11/2018
 * Time: 12:49 PM
 */
namespace Webbeds\HotelApiSdk\Types;

use Laminas\Uri\Http;
use StringTemplate;

/**
 * Class ApiUri
 * @package Webbeds\HotelApiSdk\Types
 */
class ApiUri extends Http
{
    /*
        http://search.fitruums.com/1/PostGet/NonStaticXMLAPI.asmx
        http://search.fitruums.com/1/PostGet/StaticXMLAPI.asmx

        e.g. http://search.fitruums.com/1/PostGet/NonStaticXMLAPI.asmx?op=GetLanguages
    */

    //const Q_PATH='op=';
    const BASE_PATH='PostGet';
    const API_URI_FORMAT = '/{version}/{basepath}/{libpath}/';
        ///{version}/NonStaticXMLAPI.asmx
        ///{version}/Booking.asmx
    /**
     * Prepare URL for the operation
     * @param ApiVersion $version Version of API used for client
     */
    public function prepare(ApiVersion $version, string $lib, bool $nonStatic = true)
    {
        $strSubs = new StringTemplate\Engine;
        
        if ($lib == 'search') {
            //NonStaticXMLAPI.asmx
            $libPath = $nonStatic? 'NonStaticXMLAPI.asmx' : 'StaticXMLAPI.asmx';
        } 
        if ($lib == 'book') {
            // Booking.asmx
            $libPath = 'Booking.asmx';
        }
        $this->setPath($strSubs->render(self::API_URI_FORMAT,
            ["basepath"  => self::BASE_PATH,
             "version"   => $version->getVersion(),
             "libpath"   => $libPath]));
    }
}