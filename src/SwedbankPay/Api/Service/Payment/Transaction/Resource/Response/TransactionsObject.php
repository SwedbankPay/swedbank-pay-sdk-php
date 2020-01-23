<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionsObjectInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionsInterface;

class TransactionsObject extends TransactionResponse implements TransactionsObjectInterface
{
    /**
     * @return TransactionsInterface
     */
    public function getTransactions()
    {
        return $this->offsetGet(self::TRANSACTIONS);
    }

    /**
     * @param TransactionsInterface $transactions
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->offsetSet(self::TRANSACTIONS, $transactions);
        return $this;
    }
}
