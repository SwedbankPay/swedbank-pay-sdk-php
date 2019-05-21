<?php

namespace PayEx\Api\Service\Paymentorder\Resource;

use PayEx\Api\Service\Payment\Resource\Data\PaymentInterface;
use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentObjectInterface;
use PayEx\Api\Service\Resource;

/**
 * Payment object
 */
class PaymentObject extends Resource implements PaymentObjectInterface
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
