<?php

namespace SwedbankPay\Api\Service\Swish\Resource;

use SwedbankPay\Api\Service\Swish\Resource\Data\SwishPaymentObjectInterface;
use SwedbankPay\Api\Service\Swish\Resource\Request\Data\PaymentInterface;
use SwedbankPay\Api\Service\Resource;

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
