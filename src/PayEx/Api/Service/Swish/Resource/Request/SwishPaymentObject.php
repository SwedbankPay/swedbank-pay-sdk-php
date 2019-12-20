<?php

namespace PayEx\Api\Service\Swish\Resource\Request;

use PayEx\Api\Service\Resource\Request as RequestResource;
use PayEx\Api\Service\Swish\Resource\Request\Data\SwishPaymentObjectInterface;
use PayEx\Api\Service\Swish\Resource\Request\Data\PaymentInterface;

/**
 * Swish Payment object
 */
class SwishPaymentObject extends RequestResource implements SwishPaymentObjectInterface
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
