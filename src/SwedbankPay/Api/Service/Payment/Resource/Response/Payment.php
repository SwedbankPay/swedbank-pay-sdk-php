<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Response;

use SwedbankPay\Api\Service\Payment\Resource\PaymentTrait;
use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentResourceUriInterface;
use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentResponseInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * Payment request resource object
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 */
class Payment extends ResponseResource implements PaymentResponseInterface
{
    use PaymentTrait;

    /**
     * @return PaymentResourceUriInterface
     */
    public function getUrls()
    {
        return $this->offsetGet(self::URLS);
    }

    /**
     * @param PaymentResourceUriInterface $urls
     * @return $this
     */
    public function setUrls($urls)
    {
        return $this->offsetSet(self::URLS, $urls);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getPayeeInfo()
    {
        return $this->offsetGet(self::PAYEE_INFO);
    }

    /**
     * @param PaymentResourceUriInterface $payeeInfo
     * @return $this
     */
    public function setPayeeInfo($payeeInfo)
    {
        return $this->offsetSet(self::PAYEE_INFO, $payeeInfo);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setId($paymentId)
    {
        return $this->offsetSet(self::ID, $paymentId);
    }

    /**
     * @return integer
     */
    public function getNumber()
    {
        return $this->offsetGet(self::NUMBER);
    }

    /**
     * @param integer $number
     * @return $this
     */
    public function setNumber($number)
    {
        return $this->offsetSet(self::NUMBER, $number);
    }

    /**
     * @return string
     */
    public function getInstrument()
    {
        return $this->offsetGet(self::INSTRUMENT);
    }

    /**
     * @param string $instrument
     * @return $this
     */
    public function setInstrument($instrument)
    {
        return $this->offsetSet(self::INSTRUMENT, $instrument);
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->offsetGet(self::CREATED);
    }

    /**
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        return $this->offsetSet(self::CREATED, $created);
    }

    /**
     * @return string
     */
    public function getUpdated()
    {
        return $this->offsetGet(self::UPDATED);
    }

    /**
     * @param string $updated
     * @return $this
     */
    public function setUpdated($updated)
    {
        return $this->offsetSet(self::UPDATED, $updated);
    }

    /**
     * @return string
     */
    public function getOperation()
    {
        return $this->offsetGet(self::OPERATION);
    }

    /**
     * @param string $operation
     * @return $this
     */
    public function setOperation($operation)
    {
        return $this->offsetSet(self::OPERATION, $operation);
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->offsetGet(self::STATE);
    }

    /**
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        return $this->offsetSet(self::STATE, $state);
    }

    /**
     * @return integer
     */
    public function getAmount()
    {
        return $this->offsetGet(self::AMOUNT);
    }

    /**
     * @param integer $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        return $this->offsetSet(self::AMOUNT, $amount);
    }

    /**
     * @return integer
     */
    public function getRemainingCaptureAmount()
    {
        return $this->offsetGet(self::REMAINING_CAPTURE_AMOUNT);
    }

    /**
     * @param integer $amount
     * @return mixed
     */
    public function setRemainingCaptureAmount($amount)
    {
        return $this->offsetSet(self::REMAINING_CAPTURE_AMOUNT, $amount);
    }

    /**
     * @return integer
     */
    public function getRemainingCancellationAmount()
    {
        return $this->offsetGet(self::REMAINING_CANCELLATION_AMOUNT);
    }

    /**
     * @param integer $amount
     * @return $this
     */
    public function setRemainingCancellationAmount($amount)
    {
        return $this->offsetSet(self::REMAINING_CANCELLATION_AMOUNT, $amount);
    }

    /**
     * @return integer
     */
    public function getRemainingReversalAmount()
    {
        return $this->offsetGet(self::REMAINING_REVERSAL_AMOUNT);
    }

    /**
     * @param integer $amount
     * @return $this
     */
    public function setRemainingReversalAmount($amount)
    {
        return $this->offsetSet(self::REMAINING_REVERSAL_AMOUNT, $amount);
    }

    /**
     * @return string
     */
    public function getInitiatingSystemUserAgent()
    {
        return $this->offsetGet(self::INITIATING_SYSTEM_USER_AGENT);
    }

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setInitiatingSystemUserAgent($userAgent)
    {
        return $this->offsetSet(self::INITIATING_SYSTEM_USER_AGENT, $userAgent);
    }

    /**
     * @return string
     */
    public function getPaymentToken()
    {
        return $this->offsetGet(self::PAYMENT_TOKEN);
    }

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setPaymentToken($paymentToken)
    {
        return $this->offsetSet(self::PAYMENT_TOKEN, $paymentToken);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getPrices()
    {
        return $this->offsetGet(self::PRICES);
    }

    /**
     * @param PaymentResourceUriInterface $prices
     * @return $this
     */
    public function setPrices($prices)
    {
        return $this->offsetSet(self::PRICES, $prices);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getTransactions()
    {
        return $this->offsetGet(self::TRANSACTIONS);
    }

    /**
     * @param PaymentResourceUriInterface $transactions
     * @return $this
     */
    public function setTransactions($transactions)
    {
        return $this->offsetSet(self::TRANSACTIONS, $transactions);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getAuthorizations()
    {
        return $this->offsetGet(self::AUTHORIZATIONS);
    }

    /**
     * @param PaymentResourceUriInterface $authorizations
     * @return $this
     */
    public function setAuthorizations($authorizations)
    {
        return $this->offsetSet(self::AUTHORIZATIONS, $authorizations);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getCaptures()
    {
        return $this->offsetGet(self::CAPTURES);
    }

    /**
     * @param PaymentResourceUriInterface $captures
     * @return $this
     */
    public function setCaptures($captures)
    {
        return $this->offsetSet(self::CAPTURES, $captures);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getCancellations()
    {
        return $this->offsetGet(self::CANCELLATIONS);
    }

    /**
     * @param PaymentResourceUriInterface $cancellations
     * @return $this
     */
    public function setCancellations($cancellations)
    {
        return $this->offsetSet(self::CANCELLATIONS, $cancellations);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getReversals()
    {
        return $this->offsetGet(self::REVERSALS);
    }

    /**
     * @param PaymentResourceUriInterface $reversals
     * @return $this
     */
    public function setReversals($reversals)
    {
        return $this->offsetSet(self::REVERSALS, $reversals);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getVerifications()
    {
        return $this->offsetGet(self::VERIFICATIONS);
    }

    /**
     * @param PaymentResourceUriInterface $verifications
     * @return $this
     */
    public function setVerifications($verifications)
    {
        return $this->offsetSet(self::VERIFICATIONS, $verifications);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getMetadata()
    {
        return $this->offsetGet(self::METADATA);
    }

    /**
     * @param PaymentResourceUriInterface $metadata
     * @return $this
     */
    public function setMetadata($metadata)
    {
        return $this->offsetSet(self::METADATA, $metadata);
    }

    /**
     * @return PaymentResourceUriInterface
     */
    public function getSettings()
    {
        return $this->offsetGet(self::SETTINGS);
    }

    /**
     * @param PaymentResourceUriInterface $settings
     * @return $this
     */
    public function setSettings($settings)
    {
        return $this->offsetSet(self::SETTINGS, $settings);
    }
}
