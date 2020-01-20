<?php

namespace PayEx\Api\Service\Payment\Transaction\Response\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\TransactionListCollection;

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
