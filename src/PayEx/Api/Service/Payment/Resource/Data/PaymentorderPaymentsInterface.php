<?php

namespace PayEx\Api\Service\Payment\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;

/**
 * Payment order payments interface
 *
 * @api
 */
interface PaymentorderPaymentsInterface extends ResourceInterface
{
    const PAYMENT_ORDER = 'payment_order';
    const PAYMENTS = 'payments';

    /**
     * @return string
     */
    public function getPaymentorder();

    /**
     * @param string $paymentOrder
     * @return $this
     */
    public function setPaymentorder($paymentOrder);

    /**
     * @return PaymentInterface
     */
    public function getPayments();

    /**
     * @param PaymentInterface $payments
     * @return $this
     */
    public function setPayments($payments);
}
