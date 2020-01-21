<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Request;

use SwedbankPay\Api\Service\Resource;
use SwedbankPay\Api\Service\Payment\Resource\Request\Data\UrlInterface;

/**
 * Payment order url data object
 */
class Url extends Resource implements UrlInterface
{
    /**
     * @return string
     */
    public function getCompleteUrl()
    {
        return $this->offsetGet(self::COMPLETE_URL);
    }

    /**
     * @param string $completeUrl
     * @return $this
     */
    public function setCompleteUrl($completeUrl)
    {
        return $this->offsetSet(self::COMPLETE_URL, $completeUrl);
    }

    /**
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->offsetGet(self::CANCEL_URL);
    }

    /**
     * @param string $cancelUrl
     * @return $this
     */
    public function setCancelUrl($cancelUrl)
    {
        return $this->offsetSet(self::CANCEL_URL, $cancelUrl);
    }

    /**
     * @return string
     */
    public function getPaymentUrl()
    {
        return $this->offsetGet(self::PAYMENT_URL);
    }

    /**
     * @param string $paymentUrl
     * @return $this
     */
    public function setPaymentUrl($paymentUrl)
    {
        return $this->offsetSet(self::PAYMENT_URL, $paymentUrl);
    }

    /**
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->offsetGet(self::CALLBACK_URL);
    }

    /**
     * @param string $callbackUrl
     * @return $this
     */
    public function setCallbackUrl($callbackUrl)
    {
        return $this->offsetSet(self::CALLBACK_URL, $callbackUrl);
    }

    /**
     * @return string
     */
    public function getTermsOfService()
    {
        return $this->offsetGet(self::TERMS_OF_SERVICE_URL);
    }

    /**
     * @param string $termsOfServiceUrl
     * @return $this
     */
    public function setTermsOfService($termsOfServiceUrl)
    {
        return $this->offsetSet(self::TERMS_OF_SERVICE_URL, $termsOfServiceUrl);
    }

    /**
     * @return string
     */
    public function getLogoUrl()
    {
        return $this->offsetGet(self::LOGO_URL);
    }

    /**
     * @param string $logoUrl
     * @return $this
     */
    public function setLogoUrl($logoUrl)
    {
        return $this->offsetSet(self::LOGO_URL, $logoUrl);
    }
}
