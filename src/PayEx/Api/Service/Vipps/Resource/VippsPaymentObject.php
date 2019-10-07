<?php

namespace PayEx\Api\Service\Vipps\Resource;

use PayEx\Api\Service\Vipps\Resource\Data\VippsPaymentObjectInterface;
use PayEx\Api\Service\Vipps\Resource\Request\Data\PaymentInterface;
use PayEx\Api\Service\Resource;

/**
 * Vipps Payment object
 */
class VippsPaymentObject extends Resource implements VippsPaymentObjectInterface
{
    /**
     * @return PaymentInterface
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param PaymentInterface $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        return $this->offsetSet(self::PAYMENT, $payment);
    }
}
