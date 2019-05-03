<?php

namespace PayEx\Api\Service\Transaction\Resource\Response;

use PayEx\Api\Service\Resource;
use PayEx\Api\Service\Transaction\Resource\Response\Data\CaptureInterface;
use PayEx\Api\Service\Transaction\Resource\Response\Data\TransactionInterface;

class Capture extends Resource implements CaptureInterface
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $captureId
     * @return $this
     */
    public function setId($captureId)
    {
        return $this->offsetSet(self::ID, $captureId);
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
