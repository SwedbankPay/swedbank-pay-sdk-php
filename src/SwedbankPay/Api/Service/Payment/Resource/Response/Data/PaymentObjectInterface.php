<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Response\Data;

use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Payment object interface
 *
 * @api
 */
interface PaymentObjectInterface extends ResponseInterface
{
    const PAYMENT = 'payment';

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
