<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Response;

use PayEx\Api\Service\Paymentorder\Resource\Response\Data\GetPaymentsInterface;
use PayEx\Api\Service\Paymentorder\Resource\Response\Data\PaymentsInterface;
use PayEx\Api\Service\Resource\Response;

/**
 * Payment order payments data object
 */
class GetPayments extends Response implements GetPaymentsInterface
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
