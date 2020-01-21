<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Request;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\PaymentorderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Data\PaymentorderInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderMetadataInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderPayeeInfoInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderPayerInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderUrlInterface;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

/**
 * Payment order data object
 */
class Paymentorder extends RequestResource implements PaymentorderInterface
{
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->offsetGet(self::CURRENCY);
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        return $this->offsetSet(self::CURRENCY, $currency);
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->offsetGet(self::AMOUNT);
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        return $this->offsetSet(self::AMOUNT, $amount);
    }

    /**
     * @return int
     */
    public function getVatAmount()
    {
        return $this->offsetGet(self::VAT_AMOUNT);
    }

    /**
     * @param int $vatAmount
     * @return $this
     */
    public function setVatAmount($vatAmount)
    {
        return $this->offsetSet(self::VAT_AMOUNT, $vatAmount);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->offsetGet(self::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->offsetSet(self::DESCRIPTION, $description);
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->offsetGet(self::USER_AGENT);
    }

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        return $this->offsetSet(self::USER_AGENT, $userAgent);
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->offsetGet(self::LANGUAGE);
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage($language)
    {
        return $this->offsetSet(self::LANGUAGE, $language);
    }

    /**
     * @return bool
     */
    public function isGeneratePaymentToken()
    {
        return $this->offsetGet(self::GENERATE_PAYMENT_TOKEN);
    }

    /**
     * @param bool $generatePaymentToken
     * @return $this
     */
    public function setGeneratePaymentToken($generatePaymentToken)
    {
        return $this->offsetSet(self::GENERATE_PAYMENT_TOKEN, $generatePaymentToken);
    }

    /**
     * @return bool
     */
    public function isDisablePaymentMenu()
    {
        return $this->offsetGet(self::DISABLE_PAYMENT_MENU);
    }

    /**
     * @param bool $disablePaymentMenu
     * @return $this
     */
    public function setDisablePaymentMenu($disablePaymentMenu)
    {
        return $this->offsetSet(self::DISABLE_PAYMENT_MENU, $disablePaymentMenu);
    }

    /**
     * @return PaymentorderUrlInterface
     */
    public function getUrls()
    {
        return $this->offsetGet(self::URLS);
    }

    /**
     * @param PaymentorderUrlInterface $urls
     * @return $this
     */
    public function setUrls($urls)
    {
        return $this->offsetSet(self::URLS, $urls);
    }

    /**
     * @return PaymentorderPayeeInfoInterface
     */
    public function getPayeeInfo()
    {
        return $this->offsetGet(self::PAYEE_INFO);
    }

    /**
     * @param PaymentorderPayeeInfoInterface $payeeInfo
     * @return $this
     */
    public function setPayeeInfo($payeeInfo)
    {
        return $this->offsetSet(self::PAYEE_INFO, $payeeInfo);
    }

    /**
     * @return PaymentorderPayerInterface
     */
    public function getPayer()
    {
        return $this->offsetGet(self::PAYER);
    }

    /**
     * @param PaymentorderPayerInterface $payer
     * @return $this
     */
    public function setPayer($payer)
    {
        return $this->offsetSet(self::PAYER, $payer);
    }

    /**
     * @return OrderItemsCollection
     */
    public function getOrderItems()
    {
        return $this->offsetGet(self::ORDER_ITEMS);
    }

    /**
     * @param OrderItemsCollection|array $orderItems
     * @return $this
     */
    public function setOrderItems($orderItems)
    {
        if (!($orderItems instanceof OrderItemsCollection)) {
            $orderItems = new OrderItemsCollection($orderItems);
        }

        return $this->offsetSet(self::ORDER_ITEMS, $orderItems);
    }

    /**
     * @return PaymentorderMetadataInterface
     */
    public function getMetadata()
    {
        return $this->offsetGet(self::METADATA);
    }

    /**
     * @param PaymentorderMetadataInterface $metadata
     * @return $this
     */
    public function setMetadata($metadata)
    {
        return $this->offsetSet(self::METADATA, $metadata);
    }

    /**
     * @return PaymentorderItemsCollection
     */
    public function getItems()
    {
        return $this->offsetGet(self::ITEMS);
    }

    /**
     * @param PaymentorderItemsCollection|array $items
     * @return $this
     */
    public function setItems($items)
    {
        if (!($items instanceof PaymentorderItemsCollection)) {
            $items = new PaymentorderItemsCollection($items);
        }

        return $this->offsetSet(self::ITEMS, $items);
    }

    /**
     * @return string
     */
    public function getIntent()
    {
        return $this->offsetGet(self::INTENT);
    }

    /**
     * @param string $intent
     * @return $this
     */
    public function setIntent($intent)
    {
        return $this->offsetSet(self::INTENT, $intent);
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
}
