<?php

namespace SwedbankPay\Api\Service\Swish\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;
use SwedbankPay\Api\Service\Swish\Resource\Request\Data\PaymentInterface;

/**
 * Swish Payment object interface
 *
 * @api
 */
interface SwishPaymentObjectInterface extends ResourceInterface
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
