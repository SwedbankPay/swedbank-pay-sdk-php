<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Request\Data;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\PaymentorderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderMetadataInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderPayeeInfoInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderPayerInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderRiskIndicatorInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderUrlInterface;
use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

/**
 * Interface PaymentorderInterface
 * Payment order interface
 *
 * @api
 * @package SwedbankPay\Api\Service\Paymentorder\Resource\Request\Data
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
interface PaymentorderInterface extends RequestInterface
{
    const CURRENCY = 'currency';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';
    const DESCRIPTION = 'description';
    const USER_AGENT = 'user_agent';
    const LANGUAGE = 'language';
    const GENERATE_PAYMENT_TOKEN = 'generate_payment_token';
    const GENERATE_RECURRENCE_TOKEN = 'generate_recurrence_token';
    const GENERATE_UNSCHEDULED_TOKEN = 'generate_unscheduled_token';
    const DISABLE_PAYMENT_MENU = 'disable_payment_menu';
    const URLS = 'urls';
    const PAYEE_INFO = 'payee_info';
    const PAYER = 'payer';
    const PAYER_REFERENCE = 'payerReference';
    const ORDER_ITEMS = 'orderItems';
    const METADATA = 'metadata';
    const ITEMS = 'items';
    const INTENT = 'intent';
    const PAYMENT_TOKEN = 'payment_token';
    const UNSCHEDULED_TOKEN = 'unscheduled_token';
    const RECURRENCE_TOKEN = 'recurrence_token';
    const RISK_INDICATOR = 'risk_indicator';
    const INITIATING_SYSTEM_AGENT = 'initiatingSystemUserAgent';
    const PRODUCT_NAME = 'product_name';

    /**
     * Get Initiating System User Agent.
     *
     * @return string|null
     */
    public function getInitiatingSystemUserAgent();

    /**
     * Set Initiating System User Agent.
     *
     * @param string $agent
     * @return $this
     */
    public function setInitiatingSystemUserAgent($agent);
    
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
    public function getCurrency();

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency);

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
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

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
     * @return bool
     */
    public function isGeneratePaymentToken();

    /**
     * @param bool $generatePaymentToken
     * @return $this
     */
    public function setGeneratePaymentToken($generatePaymentToken);

    /**
     * @return bool
     */
    public function isGenerateRecurrenceToken();

    /**
     * @param bool $generateRecurrenceToken
     * @return $this
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setGenerateRecurrenceToken($generateRecurrenceToken);

    /**
     * @return bool
     */
    public function isGenerateUnscheduledToken();

    /**
     * @param bool $generate
     * @return $this
     */
    public function setGenerateUnscheduledToken($generate);

    /**
     * @return bool
     */
    public function isDisablePaymentMenu();

    /**
     * @param bool $disablePaymentMenu
     * @return $this
     */
    public function setDisablePaymentMenu($disablePaymentMenu);

    /**
     * @return PaymentorderUrlInterface
     */
    public function getUrls();

    /**
     * @param PaymentorderUrlInterface $urls
     * @return $this
     */
    public function setUrls($urls);

    /**
     * @return PaymentorderPayeeInfoInterface
     */
    public function getPayeeInfo();

    /**
     * @param PaymentorderPayeeInfoInterface $payeeInfo
     * @return $this
     */
    public function setPayeeInfo($payeeInfo);

    /**
     * @return PaymentorderPayerInterface
     */
    public function getPayer();

    /**
     * @param PaymentorderPayerInterface $payer
     * @return $this
     */
    public function setPayer($payer);

    /**
     * @return OrderItemsCollection
     */
    public function getOrderItems();

    /**
     * @param OrderItemsCollection|array $orderItems
     * @return $this
     */
    public function setOrderItems($orderItems);

    /**
     * @return PaymentorderItemsCollection
     */
    public function getItems();

    /**
     * @param PaymentorderItemsCollection|array $items
     * @return $this
     */
    public function setItems($items);

    /**
     * @return PaymentorderMetadataInterface
     */
    public function getMetadata();

    /**
     * @param PaymentorderMetadataInterface $metadata
     * @return $this
     */
    public function setMetadata($metadata);

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
    public function getPaymentToken();

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setPaymentToken($paymentToken);

    /**
     * @return string
     */
    public function getRecurrenceToken();

    /**
     * @param string $recurrenceToken
     * @return $this
     */
    public function setRecurrenceToken($recurrenceToken);

    /**
     * @return PaymentorderRiskIndicatorInterface
     */
    public function getRiskIndicator();

    /**
     * @param PaymentorderRiskIndicatorInterface $riskIndicator
     * @return $this
     */
    public function setRiskIndicator($riskIndicator);

    /**
     * Set Product name.
     *
     * @param $productName
     * @return $this
     */
    public function setProductName($productName);

    /**
     * Get Product name.
     *
     * @return string|null
     */
    public function getProductName();
}
