<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

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
