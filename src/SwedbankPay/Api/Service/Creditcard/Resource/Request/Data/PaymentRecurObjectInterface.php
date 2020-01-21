<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Recur payment object interface
 *
 * @api
 */
interface PaymentRecurObjectInterface extends ResourceInterface
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
