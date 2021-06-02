<?php
/**
 * User: Hamilton
 * Date: 12/11/2018
 * Time: 11:15 AM
 */

namespace Webbeds\HotelApiSdk\Types;

use Webbeds\HotelApiSdk\Model\AuditData;

/**
 * Class HotelSDKException
 * @package Webbeds\HotelApiSdk\Types
 */
class HotelSDKException extends \Exception
{
    /**
     * @var AuditData Contains an Audit Data Class with audit data of response if apply
     */
    private $auditData;
    /**
     * HotelSDKException constructor.
     * @param string $message Exception message
     * @param AuditData|null $auditData AuditData object if apply
     */
    public function __construct($message, AuditData $auditData = null)
    {
        parent::__construct($message);
        $this->auditData = $auditData;
    }
    /**
     * Return an audit data if apply
     * @return AuditData|null
     */
    public function getAuditData()
    {
        return $this->auditData;
    }
}