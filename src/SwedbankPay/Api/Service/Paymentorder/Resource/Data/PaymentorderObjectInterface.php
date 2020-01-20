<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;
use PayEx\Api\Service\Paymentorder\Resource\Request\Data\PaymentorderInterface;

/**
 * Payment order object interface interface
 *
 * @api
 */
interface PaymentorderObjectInterface extends ResourceInterface
{
    const PAYMENTORDER = 'paymentorder';

    /**
     * @return PaymentorderInterface
     */
    public function getPaymentorder();

    /**
     * @param PaymentorderInterface $paymentorder
     * @return $this
     */
    public function setPaymentorder($paymentorder);
}
