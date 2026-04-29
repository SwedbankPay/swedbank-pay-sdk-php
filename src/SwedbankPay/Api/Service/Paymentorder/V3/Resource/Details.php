<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\DetailsInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * Instrument-specific details on the v3.1 `paid` sub-resource. Field availability depends
 * on the instrument used for the payment.
 */
class Details extends ResponseResource implements DetailsInterface
{
    /** @return string|null */
    public function getNonPaymentToken()
    {
        return $this->offsetGet(self::NON_PAYMENT_TOKEN);
    }

    /** @return string|null */
    public function getExternalNonPaymentToken()
    {
        return $this->offsetGet(self::EXTERNAL_NON_PAYMENT_TOKEN);
    }

    /** @return string|null */
    public function getTransactionsOnFileToken()
    {
        return $this->offsetGet(self::TRANSACTIONS_ON_FILE_TOKEN);
    }

    /** @return string|null */
    public function getCardBrand()
    {
        return $this->offsetGet(self::CARD_BRAND);
    }

    /** @return string|null */
    public function getCardType()
    {
        return $this->offsetGet(self::CARD_TYPE);
    }

    /** @return string|null */
    public function getMaskedPan()
    {
        return $this->offsetGet(self::MASKED_PAN);
    }

    /** @return string|null */
    public function getExpiryDate()
    {
        return $this->offsetGet(self::EXPIRY_DATE);
    }

    /** @return string|null */
    public function getIssuerAuthorizationApprovalCode()
    {
        return $this->offsetGet(self::ISSUER_AUTHORIZATION_APPROVAL_CODE);
    }

    /** @return string|null */
    public function getAcquirerTransactionType()
    {
        return $this->offsetGet(self::ACQUIRER_TRANSACTION_TYPE);
    }

    /** @return string|null */
    public function getAcquirerStan()
    {
        return $this->offsetGet(self::ACQUIRER_STAN);
    }

    /** @return string|null */
    public function getAcquirerTerminalId()
    {
        return $this->offsetGet(self::ACQUIRER_TERMINAL_ID);
    }

    /** @return string|null */
    public function getAcquirerTransactionTime()
    {
        return $this->offsetGet(self::ACQUIRER_TRANSACTION_TIME);
    }

    /** @return string|null */
    public function getTransactionInitiator()
    {
        return $this->offsetGet(self::TRANSACTION_INITIATOR);
    }

    /** @return string|null */
    public function getBin()
    {
        return $this->offsetGet(self::BIN);
    }
}
