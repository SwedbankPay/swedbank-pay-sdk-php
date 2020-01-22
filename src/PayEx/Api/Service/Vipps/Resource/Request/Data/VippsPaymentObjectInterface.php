<?php

namespace PayEx\Api\Service\Vipps\Resource\Request\Data;

use PayEx\Api\Service\Data\ResourceInterface;

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
