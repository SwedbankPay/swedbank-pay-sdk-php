<?php

namespace SwedbankPay\Api\Service\MobilePay\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * MobilePay Payment object interface
 *
 * @api
 */
interface PaymentObjectInterface extends ResourceInterface
{
    const PAYMENT = 'payment';
    const MOBILEPAY = 'mobilepay';

    /**
     * @return PaymentInterface
     */
    public function getPayment();

    /**
     * @param PaymentInterface $payment
     * @return $this
     */
    public function setPayment($payment);
}
