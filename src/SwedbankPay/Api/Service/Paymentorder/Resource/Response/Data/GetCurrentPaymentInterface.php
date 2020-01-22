<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentResponseInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Payment order payments interface
 *
 * @api
 */
interface GetCurrentPaymentInterface extends ResponseInterface
{
    const PAYMENT_ORDER = 'payment_order';
    const MENU_ELEMENT_NAME = 'menu_element_name';
    const PAYMENT = 'payment';

    /**
     * @return string
     */
    public function getPaymentorder();

    /**
     * @param string $paymentOrder
     * @return $this
     */
    public function setPaymentorder($paymentOrder);

    /**
     * @return string
     */
    public function getElementMenuName();

    /**
     * @param string $elementMenuName
     * @return $this
     */
    public function setElementMenuName($elementMenuName);

    /**
     * @return PaymentResponseInterface
     */
    public function getPayment();

    /**
     * @param PaymentResponseInterface $payment
     * @return $this
     */
    public function setPayment($payment);
}
