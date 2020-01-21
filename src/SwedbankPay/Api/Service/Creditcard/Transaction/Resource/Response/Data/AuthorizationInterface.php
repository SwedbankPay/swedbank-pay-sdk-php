<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

interface AuthorizationInterface extends TransactionResourceInterface
{
    const DIRECT = 'direct';
    const PAYMENT_TOKEN = 'payment_token';
    const RECURRENCE_TOKEN = 'recurrence_token';
    const MASKED_PAN = 'masked_pan';
    const EXPIRY_DATE = 'expiry_date';
    const PAN_TOKEN = 'pan_token';
    const CARD_BRAND = 'card_brand';
    const CARD_TYPE = 'card_type';
    const ISSUING_BANK = 'issuing_bank';
    const COUNTRY_CODE = 'country_code';
    const ACQUIRER_TRANSACTION_TYPE = 'acquirer_transaction_type';
    const ISSUER_AUTHORIZATION_APPROVAL_CODE = 'issuer_authorization_approval_code';
    const ACQUIRER_STAN = 'acquirer_stan';
    const ACQUIRER_TERMINAL_ID = 'acquirer_terminal_id';
    const ACQUIRER_TRANSACTION_TIME = 'acquirer_transaction_time';
    const AUTHENTICATION_STATUS = 'authentication_status';
    const NON_PAYMENT_TOKEN = 'non_payment_token';
    const EXTERNAL_NON_PAYMENT_TOKEN = 'external_non_payment_token';
    const EXTERNAL_SITE_ID = 'external_site_id';
    const TRANSACTION_INITIATOR = 'transaction_initiator';

    /**
    * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
    */
    public function getDirect();
    
    /**
    * @param bool $direct
    * @return $this
    */
    public function setDirect($direct);
    
    /**
    * @return string
    */
    public function getPaymentToken();
    
    /**
    * @param string $paymentToken
    * @return $this
    */
    public function setPaymentToken($paymentToken);
    
    /**
    * @return string
    */
    public function getRecurrenceToken();
    
    /**
    * @param string $recurrenceToken
    * @return $this
    */
    public function setRecurrenceToken($recurrenceToken);
    
    /**
    * @return string
    */
    public function getMaskedPan();
    
    /**
    * @param string $maskedPan
    * @return $this
    */
    public function setMaskedPan($maskedPan);
    
    /**
    * @return string
    */
    public function getExpiryDate();
    
    /**
    * @param string $expiryDate
    * @return $this
    */
    public function setExpiryDate($expiryDate);
    
    /**
    * @return string
    */
    public function getPanToken();
    
    /**
    * @param string $panToken
    * @return $this
    */
    public function setPanToken($panToken);
    
    /**
    * @return string
    */
    public function getCardBrand();
    
    /**
    * @param string $cardBrand
    * @return $this
    */
    public function setCardBrand($cardBrand);
    
    /**
    * @return string
    */
    public function getCardType();
    
    /**
    * @param string $cardType
    * @return $this
    */
    public function setCardType($cardType);
    
    /**
    * @return string
    */
    public function getIssuingBank();
    
    /**
    * @param string $issuingBank
    * @return $this
    */
    public function setIssuingBank($issuingBank);
    
    /**
    * @return string
    */
    public function getCountryCode();
    
    /**
    * @param string $countryCode
    * @return $this
    */
    public function setCountryCode($countryCode);
    
    /**
    * @return string
    */
    public function getAcquirerTransactionType();
    
    /**
     * @param string $transactionType
     * @return $this
     */
    public function setAcquirerTransactionType($transactionType);
    
    /**
     * @return string
    */
    public function getIssuerAuthorizationApprovalCode();
    
    /**
     * @param string $authApprovalCode
     * @return $this
     */
    public function setIssuerAuthorizationApprovalCode($authApprovalCode);
    
    /**
    * @return string
    */
    public function getAcquirerStan();
    
    /**
    * @param string $acquirerStan
    * @return $this
    */
    public function setAcquirerStan($acquirerStan);
    
    /**
    * @return string
    */
    public function getAcquirerTerminalId();
    
    /**
    * @param string $acquirerTerminalId
    * @return $this
    */
    public function setAcquirerTerminalId($acquirerTerminalId);
    
    /**
    * @return string
    */
    public function getAcquirerTransactionTime();
    
    /**
     * @param string $transactionTime
     * @return $this
     */
    public function setAcquirerTransactionTime($transactionTime);
    
    /**
    * @return string
    */
    public function getAuthenticationStatus();
    
    /**
    * @param string $authenticationStatus
    * @return $this
    */
    public function setAuthenticationStatus($authenticationStatus);
    
    /**
    * @return string
    */
    public function getNonPaymentToken();
    
    /**
    * @param string $nonPaymentToken
    * @return $this
    */
    public function setNonPaymentToken($nonPaymentToken);
    
    /**
    * @return string
    */
    public function getExternalNonPaymentToken();
    
    /**
     * @param string $nonPaymentToken
     * @return $this
     */
    public function setExternalNonPaymentToken($nonPaymentToken);
    
    /**
    * @return string
    */
    public function getExternalSiteId();
    
    /**
    * @param string $externalSiteId
    * @return $this
    */
    public function setExternalSiteId($externalSiteId);
    
    /**
    * @return string
    */
    public function getTransactionInitiator();
    
    /**
    * @param string $transactionInitiator
    * @return $this
    */
    public function setTransactionInitiator($transactionInitiator);
}
