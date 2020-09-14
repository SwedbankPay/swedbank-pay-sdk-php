<?php

namespace SwedbankPay\Api\Service\Trustly\Resource\Request;

use SwedbankPay\Api\Service\Trustly\Resource\Request\Data\PaymentObjectInterface;
use SwedbankPay\Api\Service\Trustly\Resource\Request\Data\PaymentInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Trustly Payment object
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
