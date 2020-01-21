<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Response;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;
use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentResponseInterface;
use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentObjectInterface;
use SwedbankPay\Api\Service\Resource\Response;

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
