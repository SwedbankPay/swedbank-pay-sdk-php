<?php

namespace PayEx\Api\Service\Creditcard\Resource\Request;

use PayEx\Api\Service\Creditcard\Resource\Request\Data\PaymentPurchaseCreditCardInterface;
use PayEx\Api\Service\Creditcard\Resource\Request\Data\PaymentPurchaseObjectInterface;
use PayEx\Api\Service\Creditcard\Resource\Request\Data\PaymentPurchaseInterface;
use PayEx\Api\Service\Resource;

/**
 * Purchase payment object
 */
class PaymentPurchaseObject extends Resource implements PaymentPurchaseObjectInterface
{
    /**
     * @return PaymentPurchaseInterface
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param PaymentPurchaseInterface $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        return $this->offsetSet(self::PAYMENT, $payment);
    }

    /**
     * @return PaymentPurchaseCreditCardInterface
     */
    public function getCreditCard()
    {
        return $this->offsetGet(self::CREDIT_CARD);
    }

    /**
     * @param PaymentPurchaseCreditCardInterface $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard)
    {
        return $this->offsetSet(self::CREDIT_CARD, $creditCard);
    }
}
