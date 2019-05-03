<?php

namespace PayEx\Api\Service\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Data\ResourceInterface;

/**
 * Reversal object interface
 *
 * @api
 */
interface ReversalInterface extends ResourceInterface
{
    const ID = 'id';

    const TRANSACTION = 'transaction';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $reversalId
     * @return $this
     */
    public function setId($reversalId);

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
