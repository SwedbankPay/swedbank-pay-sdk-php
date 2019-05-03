<?php

namespace PayEx\Api\Service\Transaction\Resource\Request;

use PayEx\Api\Service\Resource\Request as RequestResource;
use PayEx\Api\Service\Transaction\Resource\Request\Data\TransactionInterface;
use PayEx\Api\Service\Transaction\Resource\Request\Data\TransactionObjectInterface;

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
