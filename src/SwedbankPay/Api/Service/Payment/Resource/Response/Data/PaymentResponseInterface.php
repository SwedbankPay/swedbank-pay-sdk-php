<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Resource\Data\PaymentInterface;

/**
 * Payment response resource interface
 *
 * @api
 */
interface PaymentResponseInterface extends PaymentInterface
{
    const ID = 'id';
    const NUMBER = 'number';
    const INSTRUMENT = 'instrument';
    const CREATED = 'created';
    const UPDATED = 'updated';
    const OPERATION = 'operation';
    const STATE = 'state';
    const AMOUNT = 'amount';
    const REMAINING_CAPTURE_AMOUNT = 'remaining_capture_amount';
    const REMAINING_CANCELLATION_AMOUNT = 'remaining_cancellation_amount';
    const REMAINING_REVERSAL_AMOUNT = 'remaining_reversal_amount';
    const INITIATING_SYSTEM_USER_AGENT = 'initiating_system_user_agent';
    const PAYMENT_TOKEN = 'payment_token';
    const PRICES = 'prices';
    const TRANSACTIONS = 'transactions';
    const AUTHORIZATIONS = 'authorizations';
    const CAPTURES = 'captures';
    const CANCELLATIONS = 'cancellations';
    const REVERSALS = 'reversals';
    const VERIFICATIONS = 'verifications';
    const METADATA = 'metadata';
    const SETTINGS = 'settings';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setId($paymentId);

    /**
     * @return integer
     */
    public function getNumber();

    /**
     * @param integer $number
     * @return $this
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getInstrument();

    /**
     * @param string $instrument
     * @return $this
     */
    public function setInstrument($instrument);

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
    public function getOperation();

    /**
     * @param string $operation
     * @return $this
     */
    public function setOperation($operation);

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
     * @return integer
     */
    public function getAmount();

    /**
     * @param integer $amount
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return integer
     */
    public function getRemainingCaptureAmount();

    /**
     * @param integer $amount
     * @return mixed
     */
    public function setRemainingCaptureAmount($amount);

    /**
     * @return integer
     */
    public function getRemainingCancellationAmount();

    /**
     * @param integer $amount
     * @return $this
     */
    public function setRemainingCancellationAmount($amount);

    /**
     * @return integer
     */
    public function getRemainingReversalAmount();

    /**
     * @param integer $amount
     * @return $this
     */
    public function setRemainingReversalAmount($amount);

    /**
     * @return string
     */
    public function getInitiatingSystemUserAgent();

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setInitiatingSystemUserAgent($userAgent);

    /**
     * @return string
     */
    public function getPaymentToken();

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setPaymentToken($paymentToken);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getPrices();

    /**
     * @param PaymentResourceUriInterface $prices
     * @return $this
     */
    public function setPrices($prices);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getTransactions();

    /**
     * @param PaymentResourceUriInterface $transactions
     * @return $this
     */
    public function setTransactions($transactions);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getAuthorizations();

    /**
     * @param PaymentResourceUriInterface $authorizations
     * @return $this
     */
    public function setAuthorizations($authorizations);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getCaptures();

    /**
     * @param PaymentResourceUriInterface $captures
     * @return $this
     */
    public function setCaptures($captures);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getCancellations();

    /**
     * @param PaymentResourceUriInterface $cancellations
     * @return $this
     */
    public function setCancellations($cancellations);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getReversals();

    /**
     * @param PaymentResourceUriInterface $reversals
     * @return $this
     */
    public function setReversals($reversals);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getVerifications();

    /**
     * @param PaymentResourceUriInterface $verifications
     * @return $this
     */
    public function setVerifications($verifications);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getMetadata();

    /**
     * @param PaymentResourceUriInterface $metadata
     * @return $this
     */
    public function setMetadata($metadata);

    /**
     * @return PaymentResourceUriInterface
     */
    public function getSettings();

    /**
     * @param PaymentResourceUriInterface $settings
     * @return $this
     */
    public function setSettings($settings);
}
