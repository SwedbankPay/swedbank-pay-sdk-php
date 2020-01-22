<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

/**
 * Transaction Authorization Interface
 *
 * @api
 */
interface AuthorizationInterface extends RequestInterface
{
    const TRANSACTION = 'transaction';
    const CONSUMER = 'consumer';
    const LEGAL_ADDRESS = 'legal_address';
    const BILLING_ADDRESS = 'billing_address';

    /**
     * @return TransactionInterface
     */
    public function getTransaction();

    /**
     * @param TransactionInterface $transaction
     * @return $this
     */
    public function setTransaction($transaction);

    /**
     * @return ConsumerInterface
     */
    public function getConsumer();

    /**
     * @param ConsumerInterface $consumer
     * @return $this
     */
    public function setConsumer($consumer);

    /**
     * @return ConsumerAddressInterface
     */
    public function getLegalAddress();

    /**
     * @param ConsumerAddressInterface $legalAddress
     * @return $this
     */
    public function setLegalAddress($legalAddress);

    /**
     * @return ConsumerAddressInterface
     */
    public function getBillingAddress();

    /**
     * @param ConsumerAddressInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress($billingAddress);
}
