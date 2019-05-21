<?php

namespace PayEx\Api\Service\Transaction\Resource\Request\Data;

use PayEx\Api\Service\Resource\Data\RequestInterface;

/**
 * Transaction object interface
 *
 * @api
 */
interface TransactionObjectInterface extends RequestInterface
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
