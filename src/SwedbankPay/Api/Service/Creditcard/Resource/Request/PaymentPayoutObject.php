<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentPayoutObjectInterface;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentRecurInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payout payment object
 */
class PaymentPayoutObject extends Resource implements PaymentPayoutObjectInterface
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
