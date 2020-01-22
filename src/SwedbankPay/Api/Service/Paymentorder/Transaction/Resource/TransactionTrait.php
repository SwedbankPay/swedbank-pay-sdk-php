<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource;

/**
 * Trait TransactionTrait
 * @package SwedbankPay\Api\Service\Paymentorder\Transaction\Resource
 */
trait TransactionTrait
{
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->offsetGet(self::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->offsetSet(self::DESCRIPTION, $description);
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

    /**
     * @return string
     */
    public function getPayeeReference()
    {
        return $this->offsetGet(self::PAYEE_REFERENCE);
    }

    /**
     * @param string $payeeReference
     * @return $this
     */
    public function setPayeeReference($payeeReference)
    {
        return $this->offsetSet(self::PAYEE_REFERENCE, $payeeReference);
    }
}
