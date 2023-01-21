<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentRecurInterface;
use SwedbankPay\Api\Service\Payment\Resource\Request\Payment as PaymentRequest;

/**
 * Recur payment data object
 */
class PaymentRecur extends PaymentRequest implements PaymentRecurInterface
{
    /**
     * @return string
     */
    public function getPaymentToken()
    {
        return $this->offsetGet(self::PAYMENT_TOKEN);
    }

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setPaymentToken($paymentToken)
    {
        return $this->offsetSet(self::PAYMENT_TOKEN, $paymentToken);
    }

    /**
     * @return string
     */
    public function getRecurrenceToken()
    {
        return $this->offsetGet(self::RECURRENCE_TOKEN);
    }

    /**
     * @param string $recurrenceToken
     * @return $this
     */
    public function setRecurrenceToken($recurrenceToken)
    {
        return $this->offsetSet(self::RECURRENCE_TOKEN, $recurrenceToken);
    }

    /**
     * @return string
     */
    public function getUnscheduledToken()
    {
        return $this->offsetGet(self::UNSCHEDULED_TOKEN);
    }

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setUnscheduledToken($paymentToken)
    {
        return $this->offsetSet(self::UNSCHEDULED_TOKEN, $paymentToken);
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->offsetGet(self::AMOUNT);
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        return $this->offsetSet(self::AMOUNT, $amount);
    }

    /**
     * @return int
     */
    public function getVatAmount()
    {
        return $this->offsetGet(self::VAT_AMOUNT);
    }

    /**
     * @param int $vatAmount
     * @return $this
     */
    public function setVatAmount($vatAmount)
    {
        return $this->offsetSet(self::VAT_AMOUNT, $vatAmount);
    }
}
