<?php

namespace PayEx\Api\Service\Paymentorder\Resource;

use PayEx\Api\Service\Paymentorder\Resource\Request\Data\PaymentorderInterface;
use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderObjectInterface;
use PayEx\Api\Service\Resource;

/**
 * Payment order object
 */
class PaymentorderObject extends Resource implements PaymentorderObjectInterface
{

    /**
     * @return PaymentorderInterface
     */
    public function getPaymentorder()
    {
        return $this->offsetGet(self::PAYMENTORDER);
    }

    /**
     * @param PaymentorderInterface $paymentorder
     * @return $this
     */
    public function setPaymentorder($paymentorder)
    {
        return $this->offsetSet(self::PAYMENTORDER, $paymentorder);
    }
}
