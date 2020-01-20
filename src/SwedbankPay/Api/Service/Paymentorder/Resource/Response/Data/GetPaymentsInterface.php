<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Response\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payment order payments interface
 *
 * @api
 */
interface GetPaymentsInterface extends ResourceInterface
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
     * @return PaymentsInterface
     */
    public function getPayments();

    /**
     * @param PaymentsInterface $payments
     * @return $this
     */
    public function setPayments($payments);
}
