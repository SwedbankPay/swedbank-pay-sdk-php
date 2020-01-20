<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionObjectInterface;
use PayEx\Api\Service\Payment\Transaction\Response\Data\TransactionInterface;
use PayEx\Api\Service\Resource\Response;

class TransactionObject extends TransactionResponse implements TransactionObjectInterface
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
        $this->offsetSet(self::TRANSACTION, $transaction);
        return $this;
    }
}
