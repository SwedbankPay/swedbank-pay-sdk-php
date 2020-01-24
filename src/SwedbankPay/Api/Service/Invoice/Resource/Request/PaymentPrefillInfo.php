<?php

namespace SwedbankPay\Api\Service\Invoice\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\PaymentPrefillInfoInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Invoice payment prefill info data object
 */
class PaymentPrefillInfo extends Resource implements PaymentPrefillInfoInterface
{
    /**
     * @return string
     */
    public function getMsisdn()
    {
        return $this->offsetGet(self::MSISDN);
    }

    /**
     * @param string $msisdn
     * @return $this
     */
    public function setMsisdn($msisdn)
    {
        return $this->offsetSet(self::MSISDN, $msisdn);
    }
}
