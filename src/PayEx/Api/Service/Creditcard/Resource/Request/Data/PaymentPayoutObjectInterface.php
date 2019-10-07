<?php

namespace PayEx\Api\Service\Creditcard\Resource\Request\Data;

use PayEx\Api\Service\Data\ResourceInterface;

/**
 * Payout payment object interface
 *
 * @api
 */
interface PaymentPayoutObjectInterface extends ResourceInterface
{
    const PAYMENT = 'payment';

    /**
     * @return PaymentRecurInterface
     */
    public function getPayment();

    /**
     * @param PaymentRecurInterface $payment
     * @return $this
     */
    public function setPayment($payment);
}
