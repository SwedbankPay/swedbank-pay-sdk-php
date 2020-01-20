<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Response;

use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentResponseInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Response\Data\GetCurrentPaymentInterface;
use SwedbankPay\Api\Service\Resource\Response;

/**
 * Payment order payments data object
 */
class GetCurrentPayment extends Response implements GetCurrentPaymentInterface
{
    /**
     * @return string
     */
    public function getPaymentorder()
    {
        return $this->offsetGet(self::PAYMENT_ORDER);
    }

    /**
     * @param string $paymentOrder
     * @return $this
     */
    public function setPaymentorder($paymentOrder)
    {
        return $this->offsetSet(self::PAYMENT_ORDER, $paymentOrder);
    }

    /**
     * @return string
     */
    public function getElementMenuName()
    {
        return $this->offsetGet(self::MENU_ELEMENT_NAME);
    }

    /**
     * @param string $elementMenuName
     * @return $this
     */
    public function setElementMenuName($elementMenuName)
    {
        return $this->offsetSet(self::MENU_ELEMENT_NAME, $elementMenuName);
    }

    /**
     * @return PaymentResponseInterface
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param PaymentResponseInterface $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        return $this->offsetSet(self::PAYMENT, $payment);
    }
}
