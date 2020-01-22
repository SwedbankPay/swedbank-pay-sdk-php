<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentRecurObjectInterface;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentRecurInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Recur payment object
 */
class PaymentRecurObject extends Resource implements PaymentRecurObjectInterface
{
    /**
     * @return PaymentRecurInterface
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param PaymentRecurInterface $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        return $this->offsetSet(self::PAYMENT, $payment);
    }
}
