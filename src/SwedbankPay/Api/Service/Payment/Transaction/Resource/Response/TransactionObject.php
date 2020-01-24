<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionObjectInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionInterface;

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
