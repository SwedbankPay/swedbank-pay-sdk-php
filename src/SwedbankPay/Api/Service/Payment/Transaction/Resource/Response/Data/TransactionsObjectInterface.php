<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface TransactionsObjectInterface extends TransactionResponseInterface
{
    const TRANSACTIONS = 'transactions';

    /**
     * @return TransactionsInterface
     */
    public function getTransactions();

    /**
     * @param TransactionsInterface $transactions
     * @return $this
     */
    public function setTransactions($transactions);
}
