<?php

namespace PayEx\Api\Service\Payment\Resource;

use PayEx\Api\Service\Payment\Resource\Data\PaymentorderPaymentsInterface;
use PayEx\Api\Service\Payment\Resource\Response\Data\PaymentsInterface;
use PayEx\Api\Service\Resource;

/**
 * Payment order payments data object
 */
class PaymentorderPayments extends Resource implements PaymentorderPaymentsInterface
{
    /**
     * @return string
     */
    public function getPaymentorder()
    {
        return $this->offsetGet(self::PAYMENT_ORDER);
    }

    /**
     * @param string $paymentOrder
     * @return $this
     */
    public function setPaymentorder($paymentOrder)
    {
        return $this->offsetSet(self::PAYMENT_ORDER, $paymentOrder);
    }

    /**
     * @return PaymentsInterface
     */
    public function getPayments()
    {
        return $this->offsetGet(self::PAYMENTS);
    }

    /**
     * @param PaymentsInterface $payments
     * @return $this
     */
    public function setPayments($payments)
    {
        return $this->offsetSet(self::PAYMENTS, $payments);
    }
}
