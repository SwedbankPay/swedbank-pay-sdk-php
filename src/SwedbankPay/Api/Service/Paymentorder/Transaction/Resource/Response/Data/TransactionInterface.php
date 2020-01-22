<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Transaction interface
 *
 * @api
 */
interface TransactionInterface extends ResponseInterface
{
    const ID = 'id';
    const CREATED = 'created';
    const UPDATED = 'updated';
    const TYPE = 'type';
    const STATE = 'state';
    const NUMBER = 'number';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';
    const DESCRIPTION = 'description';
    const PAYEE_REFERENCE = 'payee_reference';
    const FAILED_REASON = 'failed_reason';
    const IS_OPERATIONAL = 'is_operational';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $transactionId
     * @return $this
     */
    public function setId($transactionId);

    /**
     * @return string
     */
    public function getCreated();

    /**
     * @param string $created
     * @return $this
     */
    public function setCreated($created);

    /**
     * @return string
     */
    public function getUpdated();

    /**
     * @param string $updated
     * @return $this
     */
    public function setUpdated($updated);

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type);

    /**
     * @return string
     */
    public function getState();

    /**
     * @param string $state
     * @return $this
     */
    public function setState($state);

    /**
     * @return string
     */
    public function getNumber();

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return int
     */
    public function getAmount();

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return int
     */
    public function getVatAmount();

    /**
     * @param int $vatAmount
     * @return $this
     */
    public function setVatAmount($vatAmount);

    /**
     * @return string
     */
    public function getPayeeReference();

    /**
     * @param string $payeeReference
     * @return $this
     */
    public function setPayeeReference($payeeReference);

    /**
     * @return string
     */
    public function getFailedReason();

    /**
     * @param string $failedReason
     * @return $this
     */
    public function setFailedReason($failedReason);

    /**
     * @return string
     */
    public function getIsOperational();

    /**
     * @param string $isOperational
     * @return $this
     */
    public function setIsOperational($isOperational);
}
