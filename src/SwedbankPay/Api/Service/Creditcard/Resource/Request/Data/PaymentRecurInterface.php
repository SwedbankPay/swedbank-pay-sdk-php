<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;

/**
 * Recur Payment Interface
 *
 * @api
 */
interface PaymentRecurInterface extends PaymentRequestInterface
{
    const PAYMENT_TOKEN = 'payment_token';
    const RECURRENCE_TOKEN = 'recurrence_token';
    const UNSCHEDULED_TOKEN = 'unscheduled_token';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';

    /**
     * @return string
     */
    public function getPaymentToken();

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setPaymentToken($paymentToken);

    /**
     * @return string
     */
    public function getRecurrenceToken();

    /**
     * @param string $recurrenceToken
     * @return $this
     */
    public function setRecurrenceToken($recurrenceToken);

    /**
     * @return string
     */
    public function getUnscheduledToken();

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setUnscheduledToken($paymentToken);

    /**
     * @return int
     */
    public function getAmount();

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return int
     */
    public function getVatAmount();

    /**
     * @param int $vatAmount
     * @return $this
     */
    public function setVatAmount($vatAmount);
}
