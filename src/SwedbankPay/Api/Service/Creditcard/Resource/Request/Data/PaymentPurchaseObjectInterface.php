<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Purchase payment object interface
 *
 * @api
 */
interface PaymentPurchaseObjectInterface extends ResourceInterface
{
    const PAYMENT = 'payment';
    const CREDIT_CARD = 'credit_card';

    /**
     * @return PaymentPurchaseInterface
     */
    public function getPayment();

    /**
     * @param PaymentPurchaseInterface $payment
     * @return $this
     */
    public function setPayment($payment);

    /**
     * @return PaymentPurchaseCreditCardInterface
     */
    public function getCreditCard();

    /**
     * @param PaymentPurchaseCreditCardInterface $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard);
}
