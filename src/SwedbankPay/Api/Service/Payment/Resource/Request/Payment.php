<?php

namespace PayEx\Api\Service\Payment\Resource\Request;

use PayEx\Api\Service\Payment\Resource\PaymentTrait;
use PayEx\Api\Service\Payment\Resource\Request\Data\PayeeInfoInterface;
use PayEx\Api\Service\Payment\Resource\Request\Data\PrefillInfoInterface;
use PayEx\Api\Service\Payment\Resource\Request\Data\UrlInterface;
use PayEx\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;
use PayEx\Api\Service\Resource\Request as RequestResource;

/**
 * Payment request resource object
 */
class Payment extends RequestResource implements PaymentRequestInterface
{
    use PaymentTrait;

    /**
     * @return UrlInterface
     */
    public function getUrls()
    {
        return $this->offsetGet(self::URLS);
    }

    /**
     * @param UrlInterface $urls
     * @return $this
     */
    public function setUrls($urls)
    {
        return $this->offsetSet(self::URLS, $urls);
    }

    /**
     * @return PayeeInfoInterface
     */
    public function getPayeeInfo()
    {
        return $this->offsetGet(self::PAYEE_INFO);
    }

    /**
     * @param PayeeInfoInterface $payeeInfo
     * @return $this
     */
    public function setPayeeInfo($payeeInfo)
    {
        return $this->offsetSet(self::PAYEE_INFO, $payeeInfo);
    }

    /**
     * @return PrefillInfoInterface
     */
    public function getPrefillInfo()
    {
        return $this->offsetGet(self::PREFILL_INFO);
    }

    /**
     * @param PrefillInfoInterface $prefillInfo
     * @return $this
     */
    public function setPrefillInfo($prefillInfo)
    {
        return $this->offsetSet(self::PREFILL_INFO, $prefillInfo);
    }
}
