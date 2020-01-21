<?php

namespace SwedbankPay\Api\Service\Vipps\Resource\Request;

use SwedbankPay\Api\Service\Vipps\Resource\Request\Data\VippsPaymentObjectInterface;
use SwedbankPay\Api\Service\Vipps\Resource\Request\Data\PaymentInterface;
use SwedbankPay\Api\Service\Resource;

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
