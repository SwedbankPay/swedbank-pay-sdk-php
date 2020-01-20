<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Cancellation object interface
 *
 * @api
 */
interface CancellationInterface extends ResourceInterface
{
    const ID = 'id';

    const TRANSACTION = 'transaction';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $cancellationId
     * @return $this
     */
    public function setId($cancellationId);

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
