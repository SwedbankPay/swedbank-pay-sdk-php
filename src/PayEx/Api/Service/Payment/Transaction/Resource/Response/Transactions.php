<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\TransactionListCollection;
use PayEx\Api\Service\Payment\Transaction\Response\Data\TransactionsInterface;

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
