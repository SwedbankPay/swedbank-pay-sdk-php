<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionsInterface;

class Transactions extends TransactionResource implements TransactionsInterface
{
    /**
     * @return TransactionListCollection
     */
    public function getTransactionList()
    {
        return $this->offsetGet(self::TRANSACTION_LIST);
    }

    /**
     * @param TransactionListCollection $transactionList
     * @return $this
     */
    public function setTransactionList($transactionList)
    {
        $this->offsetSet(self::TRANSACTION_LIST, $transactionList);
        return $this;
    }
}
