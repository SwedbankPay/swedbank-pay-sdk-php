<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\ConsumerInterface;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\AuthorizationInterface;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\TransactionInterface;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

/**
 * Transaction authorization data object
 */
class Authorization extends RequestResource implements AuthorizationInterface
{
    /**
     * @return TransactionInterface
     */
    public function getTransaction()
    {
        return $this->offsetGet(self::TRANSACTION);
    }

    /**
     * @param TransactionInterface $transaction
     * @return $this
     */
    public function setTransaction($transaction)
    {
        return $this->offsetSet(self::TRANSACTION, $transaction);
    }

    /**
     * @return ConsumerInterface
     */
    public function getConsumer()
    {
        return $this->offsetGet(self::CONSUMER);
    }

    /**
     * @param ConsumerInterface $consumer
     * @return $this
     */
    public function setConsumer($consumer)
    {
        return $this->offsetSet(self::CONSUMER, $consumer);
    }

    /**
     * @return ConsumerAddressInterface
     */
    public function getLegalAddress()
    {
        return $this->offsetGet(self::LEGAL_ADDRESS);
    }

    /**
     * @param ConsumerAddressInterface $legalAddress
     * @return $this
     */
    public function setLegalAddress($legalAddress)
    {
        return $this->offsetSet(self::LEGAL_ADDRESS, $legalAddress);
    }

    /**
     * @return ConsumerAddressInterface
     */
    public function getBillingAddress()
    {
        return $this->offsetGet(self::BILLING_ADDRESS);
    }

    /**
     * @param ConsumerAddressInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress($billingAddress)
    {
        return $this->offsetSet(self::BILLING_ADDRESS, $billingAddress);
    }
}
