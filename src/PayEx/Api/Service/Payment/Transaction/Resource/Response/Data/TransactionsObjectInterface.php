<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Payment\Transaction\Response\Data\TransactionsInterface;
use PayEx\Api\Service\Resource\Data\ResponseInterface;

interface TransactionsObjectInterface extends ResponseInterface
{
    const PAYMENT = 'payment';
    const TRANSACTIONS = 'transactions';

    /**
     * @return string
     */
    public function getPayment();

    /**
     * @param string $payment
     * @return $this
     */
    public function setPayment($payment);

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
