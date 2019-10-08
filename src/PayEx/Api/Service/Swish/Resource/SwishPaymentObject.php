<?php

namespace PayEx\Api\Service\Swish\Resource;

use PayEx\Api\Service\Swish\Resource\Data\SwishPaymentObjectInterface;
use PayEx\Api\Service\Swish\Resource\Request\Data\PaymentInterface;
use PayEx\Api\Service\Resource;

/**
 * Swish Payment object
 */
class SwishPaymentObject extends Resource implements SwishPaymentObjectInterface
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
