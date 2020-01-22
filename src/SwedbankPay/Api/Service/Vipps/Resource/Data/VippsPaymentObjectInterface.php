<?php

namespace SwedbankPay\Api\Service\Vipps\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;
use SwedbankPay\Api\Service\Vipps\Resource\Request\Data\PaymentInterface;

/**
 * Vipps Payment object interface
 *
 * @api
 */
interface VippsPaymentObjectInterface extends ResourceInterface
{
    const PAYMENT = 'payment';

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
