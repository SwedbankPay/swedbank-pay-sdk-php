<?php

namespace PayEx\Api\Service\Payment\Resource\Response;

use PayEx\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;
use PayEx\Api\Service\Payment\Resource\Response\Data\PaymentResponseInterface;
use PayEx\Api\Service\Payment\Resource\Response\Data\PaymentObjectInterface;
use PayEx\Api\Service\Resource\Response;

/**
 * Payment object
 */
class PaymentObject extends Response implements PaymentObjectInterface
{

    /**
     * @return PaymentRequestInterface|PaymentResponseInterface
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param PaymentRequestInterface|PaymentResponseInterface $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        return $this->offsetSet(self::PAYMENT, $payment);
    }
}
