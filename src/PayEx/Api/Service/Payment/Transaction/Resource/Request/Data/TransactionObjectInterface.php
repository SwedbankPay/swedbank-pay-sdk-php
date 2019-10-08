<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Request\Data;

use PayEx\Api\Service\Resource\Data\RequestInterface;

/**
 * Transaction interface
 *
 * @api
 */
interface TransactionObjectInterface extends RequestInterface
{
    const TRANSACTION = 'transaction';

    /**
     * @return TransferInterface|AuthorizationInterface|CancellationInterface
     */
    public function getTransaction();

    /**
     * @param TransferInterface|AuthorizationInterface|CancellationInterface $transaction
     * @return $this
     */
    public function setTransaction($transaction);
}
