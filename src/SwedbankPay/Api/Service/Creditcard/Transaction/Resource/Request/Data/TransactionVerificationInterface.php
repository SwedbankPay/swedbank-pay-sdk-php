<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

/**
 * Transaction verification Interface
 *
 * @api
 */
interface TransactionVerificationInterface extends RequestInterface
{
    const CREDIT_CARD_ISSUER = 'credit_card_issuer';

    /**
     * @return string
     */
    public function getCreditCardIssuer();

    /**
     * @param string $creditCardIssuer
     * @return $this
     */
    public function setCreditCardIssuer($creditCardIssuer);
}
