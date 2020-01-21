<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Resource\Response as ResponseResource;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\TransactionTrait;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\TransactionInterface;

/**
 * Transaction data object
 */
class Transaction extends ResponseResource implements TransactionInterface
{
    use TransactionTrait;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $transactionId
     * @return $this
     */
    public function setId($transactionId)
    {
        return $this->offsetSet(self::ID, $transactionId);
    }

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
        return $this->offsetSet(self::CREATED, $created);
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
        return $this->offsetSet(self::UPDATED, $updated);
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
        return $this->offsetSet(self::TYPE, $type);
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
        return $this->offsetSet(self::STATE, $state);
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->offsetGet(self::NUMBER);
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        return $this->offsetSet(self::NUMBER, $number);
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
        return $this->offsetSet(self::FAILED_REASON, $failedReason);
    }

    /**
     * @return string
     */
    public function getIsOperational()
    {
        return $this->offsetGet(self::IS_OPERATIONAL);
    }

    /**
     * @param string $isOperational
     * @return $this
     */
    public function setIsOperational($isOperational)
    {
        return $this->offsetSet(self::IS_OPERATIONAL, $isOperational);
    }
}
