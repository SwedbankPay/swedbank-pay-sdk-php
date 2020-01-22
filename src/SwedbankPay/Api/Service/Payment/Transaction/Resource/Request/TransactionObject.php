<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\TransactionObjectInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\AuthorizationInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\CancellationInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\TransferInterface;
use SwedbankPay\Api\Service\Resource\Request;

/**
 * Transaction object
 */
class TransactionObject extends Request implements TransactionObjectInterface
{
    /**
     * @return TransferInterface|AuthorizationInterface|CancellationInterface
     */
    public function getTransaction()
    {
        return $this->offsetGet(self::TRANSACTION);
    }

    /**
     * @param TransferInterface|AuthorizationInterface|CancellationInterface $transaction
     * @return $this
     */
    public function setTransaction($transaction)
    {
        $this->offsetSet(self::TRANSACTION, $transaction);
        return $this;
    }
}
