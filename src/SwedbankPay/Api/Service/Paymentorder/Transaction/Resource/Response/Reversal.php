<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Resource;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\ReversalInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\TransactionInterface;

class Reversal extends Resource implements ReversalInterface
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $reversalId
     * @return $this
     */
    public function setId($reversalId)
    {
        return $this->offsetSet(self::ID, $reversalId);
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
