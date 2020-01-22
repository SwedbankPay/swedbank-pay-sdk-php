<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\Data\TransactionVerificationInterface;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

/**
 * Transaction verification data object
 */
class TransactionVerification extends RequestResource implements TransactionVerificationInterface
{
    /**
     * @return string
     */
    public function getCreditCardIssuer()
    {
        return $this->offsetGet(self::CREDIT_CARD_ISSUER);
    }

    /**
     * @param string $creditCardIssuer
     * @return $this
     */
    public function setCreditCardIssuer($creditCardIssuer)
    {
        return $this->offsetSet(self::CREDIT_CARD_ISSUER, $creditCardIssuer);
    }
}
