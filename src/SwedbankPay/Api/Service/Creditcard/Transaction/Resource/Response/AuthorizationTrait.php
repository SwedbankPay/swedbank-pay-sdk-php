<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response;

trait AuthorizationTrait
{
    /**
     * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getDirect()
    {
        return $this->offsetGet(self::DIRECT);
    }

    /**
     * @param bool $direct
     * @return $this
     */
    public function setDirect($direct)
    {
        $this->offsetSet(self::DIRECT, $direct);
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentToken()
    {
        return $this->offsetGet(self::PAYMENT_TOKEN);
    }

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setPaymentToken($paymentToken)
    {
        $this->offsetSet(self::PAYMENT_TOKEN, $paymentToken);
        return $this;
    }

    /**
     * @return string
     */
    public function getRecurrenceToken()
    {
        return $this->offsetGet(self::RECURRENCE_TOKEN);
    }

    /**
     * @param string $recurrenceToken
     * @return $this
     */
    public function setRecurrenceToken($recurrenceToken)
    {
        $this->offsetSet(self::RECURRENCE_TOKEN, $recurrenceToken);
        return $this;
    }

    /**
     * @return string
     */
    public function getMaskedPan()
    {
        return $this->offsetGet(self::MASKED_PAN);
    }

    /**
     * @param string $maskedPan
     * @return $this
     */
    public function setMaskedPan($maskedPan)
    {
        $this->offsetSet(self::MASKED_PAN, $maskedPan);
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiryDate()
    {
        return $this->offsetGet(self::EXPIRY_DATE);
    }

    /**
     * @param string $expiryDate
     * @return $this
     */
    public function setExpiryDate($expiryDate)
    {
        $this->offsetSet(self::EXPIRY_DATE, $expiryDate);
        return $this;
    }

    /**
     * @return string
     */
    public function getPanToken()
    {
        return $this->offsetGet(self::PAN_TOKEN);
    }

    /**
     * @param string $panToken
     * @return $this
     */
    public function setPanToken($panToken)
    {
        $this->offsetSet(self::PAN_TOKEN, $panToken);
        return $this;
    }

    /**
     * @return string
     */
    public function getCardBrand()
    {
        return $this->offsetGet(self::CARD_BRAND);
    }

    /**
     * @param string $cardBrand
     * @return $this
     */
    public function setCardBrand($cardBrand)
    {
        $this->offsetSet(self::CARD_BRAND, $cardBrand);
        return $this;
    }

    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->offsetGet(self::CARD_TYPE);
    }

    /**
     * @param string $cardType
     * @return $this
     */
    public function setCardType($cardType)
    {
        $this->offsetSet(self::CARD_TYPE, $cardType);
        return $this;
    }

    /**
     * @return string
     */
    public function getIssuingBank()
    {
        return $this->offsetGet(self::ISSUING_BANK);
    }

    /**
     * @param string $issuingBank
     * @return $this
     */
    public function setIssuingBank($issuingBank)
    {
        $this->offsetSet(self::ISSUING_BANK, $issuingBank);
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->offsetGet(self::COUNTRY_CODE);
    }

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->offsetSet(self::COUNTRY_CODE, $countryCode);
        return $this;
    }

    /**
     * @return string
     */
    public function getAcquirerTransactionType()
    {
        return $this->offsetGet(self::ACQUIRER_TRANSACTION_TYPE);
    }

    /**
     * @param string $transactionType
     * @return $this
     */
    public function setAcquirerTransactionType($transactionType)
    {
        $this->offsetSet(self::ACQUIRER_TRANSACTION_TYPE, $transactionType);
        return $this;
    }

    /**
     * @return string
     */
    public function getIssuerAuthorizationApprovalCode()
    {
        return $this->offsetGet(self::ISSUER_AUTHORIZATION_APPROVAL_CODE);
    }

    /**
     * @param string $authApprovalCode
     * @return $this
     */
    public function setIssuerAuthorizationApprovalCode($authApprovalCode)
    {
        $this->offsetSet(self::ISSUER_AUTHORIZATION_APPROVAL_CODE, $authApprovalCode);
        return $this;
    }

    /**
     * @return string
     */
    public function getAcquirerStan()
    {
        return $this->offsetGet(self::ACQUIRER_STAN);
    }

    /**
     * @param string $acquirerStan
     * @return $this
     */
    public function setAcquirerStan($acquirerStan)
    {
        $this->offsetSet(self::ACQUIRER_STAN, $acquirerStan);
        return $this;
    }

    /**
     * @return string
     */
    public function getAcquirerTerminalId()
    {
        return $this->offsetGet(self::ACQUIRER_TERMINAL_ID);
    }

    /**
     * @param string $acquirerTerminalId
     * @return $this
     */
    public function setAcquirerTerminalId($acquirerTerminalId)
    {
        $this->offsetSet(self::ACQUIRER_TERMINAL_ID, $acquirerTerminalId);
        return $this;
    }

    /**
     * @return string
     */
    public function getAcquirerTransactionTime()
    {
        return $this->offsetGet(self::ACQUIRER_TRANSACTION_TIME);
    }

    /**
     * @param string $transactionTime
     * @return $this
     */
    public function setAcquirerTransactionTime($transactionTime)
    {
        $this->offsetSet(self::ACQUIRER_TRANSACTION_TIME, $transactionTime);
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthenticationStatus()
    {
        return $this->offsetGet(self::AUTHENTICATION_STATUS);
    }

    /**
     * @param string $authenticationStatus
     * @return $this
     */
    public function setAuthenticationStatus($authenticationStatus)
    {
        $this->offsetSet(self::AUTHENTICATION_STATUS, $authenticationStatus);
        return $this;
    }

    /**
     * @return string
     */
    public function getNonPaymentToken()
    {
        return $this->offsetGet(self::NON_PAYMENT_TOKEN);
    }

    /**
     * @param string $nonPaymentToken
     * @return $this
     */
    public function setNonPaymentToken($nonPaymentToken)
    {
        $this->offsetSet(self::NON_PAYMENT_TOKEN, $nonPaymentToken);
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalNonPaymentToken()
    {
        return $this->offsetGet(self::EXTERNAL_NON_PAYMENT_TOKEN);
    }

    /**
     * @param string $nonPaymentToken
     * @return $this
     */
    public function setExternalNonPaymentToken($nonPaymentToken)
    {
        $this->offsetSet(self::EXTERNAL_NON_PAYMENT_TOKEN, $nonPaymentToken);
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalSiteId()
    {
        return $this->offsetGet(self::EXTERNAL_SITE_ID);
    }

    /**
     * @param string $externalSiteId
     * @return $this
     */
    public function setExternalSiteId($externalSiteId)
    {
        $this->offsetSet(self::EXTERNAL_SITE_ID, $externalSiteId);
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionInitiator()
    {
        return $this->offsetGet(self::TRANSACTION_INITIATOR);
    }

    /**
     * @param string $transactionInitiator
     * @return $this
     */
    public function setTransactionInitiator($transactionInitiator)
    {
        $this->offsetSet(self::TRANSACTION_INITIATOR, $transactionInitiator);
        return $this;
    }
}
