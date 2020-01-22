<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;

interface TransactionsInterface extends TransactionResourceInterface
{
    const TRANSACTION_LIST = 'transaction_list';

    /**
     * @return TransactionListCollection
     */
    public function getTransactionList();

    /**
     * @param TransactionListCollection $transactionList
     * @return $this
     */
    public function setTransactionList($transactionList);
}
