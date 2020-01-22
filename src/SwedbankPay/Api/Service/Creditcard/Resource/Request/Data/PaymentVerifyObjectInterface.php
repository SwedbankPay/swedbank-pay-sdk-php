<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Verify payment object interface
 *
 * @api
 */
interface PaymentVerifyObjectInterface extends ResourceInterface
{
    const PAYMENT = 'payment';
    const CREDIT_CARD = 'credit_card';

    /**
     * @return PaymentVerifyInterface
     */
    public function getPayment();

    /**
     * @param PaymentVerifyInterface $payment
     * @return $this
     */
    public function setPayment($payment);

    /**
     * @return PaymentVerifyCreditCardInterface
     */
    public function getCreditCard();

    /**
     * @param PaymentVerifyCreditCardInterface $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard);
}
