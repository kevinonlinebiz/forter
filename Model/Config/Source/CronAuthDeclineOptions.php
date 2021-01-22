<?php

namespace Forter\Forter\Model\Config\Source;

/**
 * Class PostDecisionOptions
 * @package Forter\Forter\Model\Config\Source
 */
class CronAuthDeclineOptions implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '1', 'label' => __('Cancel Order, Void or Refund Payment (CRON)')],
            ['value' => '2', 'label' => __('Set Order to Payment Review State')],
            ['value' => '3', 'label' => __('Do nothing')]
        ];
    }
}
