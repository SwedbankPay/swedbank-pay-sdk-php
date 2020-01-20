<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\ProblemInterface;

trait TransactionTrait
{
    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->offsetGet(self::CREATED);
    }

    /**
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->offsetSet(self::CREATED, $created);
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdated()
    {
        return $this->offsetGet(self::UPDATED);
    }

    /**
     * @param string $updated
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->offsetSet(self::UPDATED, $updated);
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->offsetGet(self::TYPE);
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->offsetSet(self::TYPE, $type);
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->offsetGet(self::STATE);
    }

    /**
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        $this->offsetSet(self::STATE, $state);
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->offsetGet(self::NUMBER);
    }

    /**
     * @param int $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->offsetSet(self::NUMBER, $number);
        return $this;
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
        $this->offsetSet(self::AMOUNT, $amount);
        return $this;
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
        $this->offsetSet(self::VAT_AMOUNT, $vatAmount);
        return $this;
    }

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
        $this->offsetSet(self::DESCRIPTION, $description);
        return $this;
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
        $this->offsetSet(self::PAYEE_REFERENCE, $payeeReference);
        return $this;
    }

    /**
     * @return string
     */
    public function getFailedReason()
    {
        return $this->offsetGet(self::FAILED_REASON);
    }

    /**
     * @param string $failedReason
     * @return $this
     */
    public function setFailedReason($failedReason)
    {
        $this->offsetSet(self::FAILED_REASON, $failedReason);
        return $this;
    }

    /**
     * @return string
     */
    public function getFailedActivityName()
    {
        return $this->offsetGet(self::FAILED_ACTIVITY_NAME);
    }

    /**
     * @param string $failedActivityName
     * @return $this
     */
    public function setFailedActivityName($failedActivityName)
    {
        $this->offsetSet(self::FAILED_ACTIVITY_NAME, $failedActivityName);
        return $this;
    }

    /**
     * @return string
     */
    public function getFailedErrorCode()
    {
        return $this->offsetGet(self::FAILED_ERROR_CODE);
    }

    /**
     * @param string $failedErrorCode
     * @return $this
     */
    public function setFailedErrorCode($failedErrorCode)
    {
        $this->offsetSet(self::FAILED_ERROR_CODE, $failedErrorCode);
        return $this;
    }

    /**
     * @return string
     */
    public function getFailedErrorDescription()
    {
        return $this->offsetGet(self::FAILED_ERROR_DESCRIPTION);
    }

    /**
     * @param string $failedErrorDesc
     * @return $this
     */
    public function setFailedErrorDescription($failedErrorDesc)
    {
        $this->offsetSet(self::FAILED_ERROR_DESCRIPTION, $failedErrorDesc);
        return $this;
    }

    /**
     * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getIsOperational()
    {
        return $this->offsetGet(self::IS_OPERATIONAL);
    }

    /**
     * @param bool $isOperational
     * @return $this
     */
    public function setIsOperational($isOperational)
    {
        $this->offsetSet(self::IS_OPERATIONAL, $isOperational);
        return $this;
    }

    /**
     * @return ProblemInterface
     */
    public function getProblem()
    {
        return $this->offsetGet(self::PROBLEM);
    }

    /**
     * @param ProblemInterface $problem
     * @return $this
     */
    public function setProblem($problem)
    {
        $this->offsetSet(self::PROBLEM, $problem);
        return $this;
    }
}
