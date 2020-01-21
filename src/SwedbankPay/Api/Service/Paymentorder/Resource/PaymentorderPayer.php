<?php

namespace PayEx\Api\Service\Paymentorder\Resource;

use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderPayerInterface;
use PayEx\Api\Service\Resource;

/**
 * Payment order payer data object
 */
class PaymentorderPayer extends Resource implements PaymentorderPayerInterface
{

    /**
     * @return string
     */
    public function getConsumerProfileRef()
    {
        return $this->offsetGet(self::CONSUMER_PROFILE_REF);
    }

    /**
     * @param string $consumerProfileRef
     * @return $this
     */
    public function setConsumerProfileRef($consumerProfileRef)
    {
        return $this->offsetSet(self::CONSUMER_PROFILE_REF, $consumerProfileRef);
    }
}
