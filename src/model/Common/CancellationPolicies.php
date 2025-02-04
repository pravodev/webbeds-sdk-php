<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/12/2015
 * Time: 1:33 AM
 */
namespace Webbeds\HotelApiSdk\Model\Common;

use Webbeds\HotelApiSdk\Model\ApiModel;

/**
 * Class CancellationPolicies
 * @package Webbeds\HotelApiSdk\Model
 * @property integer total Total number of CancellationPolicies
 */
class CancellationPolicies extends ApiModel
{
    public function __construct(array $cancellationPolicies = null)
    {
        $this->validFields = [
            "cancellationPolicies" => "array",
        ];

        if ($cancellationPolicies !== null) {
            $this->fields['cancellationPolicies'] = $cancellationPolicies;
        }
    }
    /**
     * @return CancellationPolicyIterator For iterate CancellationPolicies list
     */
    public function iterator()
    {
        if (isset($this->fields['cancellationPolicies']) )
        {
            $key = 0;
            // make sure there is more than one item
            if (array_key_exists("0", $this->fields['cancellationPolicies'])) {
                foreach ($this->fields['cancellationPolicies'] as &$cancellationPolicy) {
                    $cancellationPolicy['id'] = $key;
                    $key++;
                }
                return new CancellationPolicyIterator($this->fields['cancellationPolicies']);
            } else {
                $item = $this->fields['cancellationPolicies'];
                $item['id'] = $key;
                $this->fields['cancellationPolicies'] = [];
                array_push($this->fields['cancellationPolicies'], $item);
                return new CancellationPolicyIterator($this->fields['cancellationPolicies']);
            }
            
        }
            
        return new CancellationPolicyIterator([]);
    }
}