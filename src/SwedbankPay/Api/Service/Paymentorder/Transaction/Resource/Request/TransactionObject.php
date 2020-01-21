<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Resource\Request as RequestResource;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request\Data\TransactionInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request\Data\TransactionObjectInterface;

/**
 * Transaction object
 */
class TransactionObject extends RequestResource implements TransactionObjectInterface
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
}
