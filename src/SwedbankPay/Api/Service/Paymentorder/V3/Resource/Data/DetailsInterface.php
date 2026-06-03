<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data;

use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Instrument-specific details exposed on the v3.1 `paid` sub-resource. Concrete fields
 * present depend on the payment instrument (CreditCard fills card-related fields,
 * Swish/Trustly/MobilePay fill different ones, etc.).
 *
 * @api
 */
interface DetailsInterface extends ResponseInterface
{
    const NON_PAYMENT_TOKEN = 'non_payment_token';
    const EXTERNAL_NON_PAYMENT_TOKEN = 'external_non_payment_token';
    const TRANSACTIONS_ON_FILE_TOKEN = 'transactions_on_file_token';

    const CARD_BRAND = 'card_brand';
    const CARD_TYPE = 'card_type';
    const MASKED_PAN = 'masked_pan';
    // DataObjectHelper::unCamelCaseArrayKeys does not split `expiryDate` (its regex character
    // class includes uppercase D), so the JSON key is stored verbatim. Use the camelCase form.
    const EXPIRY_DATE = 'expiryDate';
    const ISSUER_AUTHORIZATION_APPROVAL_CODE = 'issuer_authorization_approval_code';
    const ACQUIRER_TRANSACTION_TYPE = 'acquirer_transaction_type';
    const ACQUIRER_STAN = 'acquirer_stan';
    const ACQUIRER_TERMINAL_ID = 'acquirer_terminal_id';
    const ACQUIRER_TRANSACTION_TIME = 'acquirer_transaction_time';
    const TRANSACTION_INITIATOR = 'transaction_initiator';
    const BIN = 'bin';

    /** @return string|null */
    public function getNonPaymentToken();

    /** @return string|null */
    public function getExternalNonPaymentToken();

    /** @return string|null */
    public function getTransactionsOnFileToken();

    /** @return string|null */
    public function getCardBrand();

    /** @return string|null */
    public function getCardType();

    /** @return string|null */
    public function getMaskedPan();

    /** @return string|null */
    public function getExpiryDate();

    /** @return string|null */
    public function getIssuerAuthorizationApprovalCode();

    /** @return string|null */
    public function getAcquirerTransactionType();

    /** @return string|null */
    public function getAcquirerStan();

    /** @return string|null */
    public function getAcquirerTerminalId();

    /** @return string|null */
    public function getAcquirerTransactionTime();

    /** @return string|null */
    public function getTransactionInitiator();

    /** @return string|null */
    public function getBin();
}
