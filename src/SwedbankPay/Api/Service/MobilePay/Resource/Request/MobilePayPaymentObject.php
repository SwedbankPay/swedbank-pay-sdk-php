<?php

namespace SwedbankPay\Api\Service\MobilePay\Resource\Request;

use SwedbankPay\Api\Service\MobilePay\Resource\Request\Data\MobilePayPaymentObjectInterface;
use SwedbankPay\Api\Service\MobilePay\Resource\Request\Data\PaymentInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * MobilePay Payment object
 */
class MobilePayPaymentObject extends Resource implements MobilePayPaymentObjectInterface
{
    /**
     * @return PaymentInterface
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param PaymentInterface $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        return $this->offsetSet(self::PAYMENT, $payment);
    }

    /**
     * Set Shoplogo Url
     *
     * @param $url
     *
     * @return MobilePayPaymentObject
     */
    public function setShoplogoUrl($url)
    {
        return $this->offsetSet(self::MOBILEPAY, ['shoplogoUrl' => $url]);
    }

    /**
     * Get Shoplogo Url
     *
     * @return mixed
     */
    public function getShoplogoUrl()
    {
        return $this->offsetGet(self::MOBILEPAY)['shoplogoUrl'];
    }
}
