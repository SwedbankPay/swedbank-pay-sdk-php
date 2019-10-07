<?php

namespace PayEx\Api\Service\Creditcard\Resource\Request;

use PayEx\Api\Service\Creditcard\Resource\Request\Data\PaymentVerifyCreditCardInterface;
use PayEx\Api\Service\Creditcard\Resource\Request\Data\PaymentVerifyObjectInterface;
use PayEx\Api\Service\Creditcard\Resource\Request\Data\PaymentVerifyInterface;
use PayEx\Api\Service\Resource;

/**
 * Verify payment object
 */
class PaymentVerifyObject extends Resource implements PaymentVerifyObjectInterface
{
    /**
     * @return PaymentVerifyInterface
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param PaymentVerifyInterface $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        return $this->offsetSet(self::PAYMENT, $payment);
    }

    /**
     * @return PaymentVerifyCreditCardInterface
     */
    public function getCreditCard()
    {
        return $this->offsetGet(self::CREDIT_CARD);
    }

    /**
     * @param PaymentVerifyCreditCardInterface $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard)
    {
        return $this->offsetSet(self::CREDIT_CARD, $creditCard);
    }
}
