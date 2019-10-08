<?php

namespace PayEx\Api\Service\Invoice\Resource;

use PayEx\Api\Service\Invoice\Resource\Data\PaymentPrefillInfoInterface;
use PayEx\Api\Service\Resource;

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
