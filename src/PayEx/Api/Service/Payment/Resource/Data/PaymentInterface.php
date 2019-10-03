<?php

namespace PayEx\Api\Service\Payment\Resource\Data;

use PayEx\Api\Service\Payment\Resource\Request\Data\PayeeInfoInterface;
use PayEx\Api\Service\Payment\Resource\Request\Data\UrlInterface;
use PayEx\Api\Service\Resource\Data\RequestInterface;

/**
 * Payment request resource interface
 *
 * @api
 */
interface PaymentInterface extends RequestInterface
{
    const INTENT = 'intent';
    const CURRENCY = 'currency';
    const DESCRIPTION = 'description';
    const PAYER_REFERENCE = 'payer_reference';
    const USER_AGENT = 'user_agent';
    const LANGUAGE = 'language';
    const URLS = 'urls';
    const PAYEE_INFO = 'payee_info';

    /**
     * @return string
     */
    public function getIntent();

    /**
     * @param string $intent
     * @return $this
     */
    public function setIntent($intent);

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency);

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
     * @return string
     */
    public function getPayerReference();

    /**
     * @param string $payerReference
     * @return $this
     */
    public function setPayerReference($payerReference);

    /**
     * @return string
     */
    public function getUserAgent();

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent($userAgent);

    /**
     * @return string
     */
    public function getLanguage();

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage($language);

    /**
     * @return UrlInterface
     */
    public function getUrls();

    /**
     * @param UrlInterface $urls
     * @return $this
     */
    public function setUrls($urls);

    /**
     * @return PayeeInfoInterface
     */
    public function getPayeeInfo();

    /**
     * @param PayeeInfoInterface $payeeInfo
     * @return $this
     */
    public function setPayeeInfo($payeeInfo);
}
