<?php

namespace PayEx\Api\Service\Transaction\Resource\Response;

use PayEx\Api\Service\Resource;
use PayEx\Api\Service\Transaction\Resource\Response\Data\CancellationInterface;
use PayEx\Api\Service\Transaction\Resource\Response\Data\TransactionInterface;

class Cancellation extends Resource implements CancellationInterface
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $cancellationId
     * @return $this
     */
    public function setId($cancellationId)
    {
        return $this->offsetSet(self::ID, $cancellationId);
    }

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
