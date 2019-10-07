<?php

namespace PayEx\Api\Service\Swish\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;
use PayEx\Api\Service\Swish\Resource\Request\Data\PaymentInterface;

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
