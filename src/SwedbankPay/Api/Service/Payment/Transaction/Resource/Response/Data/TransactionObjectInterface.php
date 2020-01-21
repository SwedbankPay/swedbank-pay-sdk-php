<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

//use SwedbankPay\Api\Service\Payment\Transaction\Response\Data\TransactionInterface;

interface TransactionObjectInterface extends TransactionResponseInterface
{
    const TRANSACTION = 'transaction';

    /**
    * @return TransactionInterface
    */
    public function getTransaction();

    /**
    * @param TransactionInterface $transaction
    * @return $this
    */
    public function setTransaction($transaction);
}
