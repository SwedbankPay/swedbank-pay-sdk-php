<?php

namespace SwedbankPay\Api\Service\Payment\Resource;

/**
 * Trait PaymentTrait
 * @package SwedbankPay\Api\Service\Payment\Resource
 */
trait PaymentTrait
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
    public function getPayerReference()
    {
        return $this->offsetGet(self::PAYER_REFERENCE);
    }

    /**
     * @param string $payerReference
     * @return $this
     */
    public function setPayerReference($payerReference)
    {
        return $this->offsetSet(self::PAYER_REFERENCE, $payerReference);
    }
}
