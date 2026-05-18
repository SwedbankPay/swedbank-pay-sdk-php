<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data;

/**
 * v3.1 `paid` sub-resource of a paymentOrder. Returned as a link stub unless expanded
 * via `?$expand=paid`. When expanded, exposes settlement details for the paid payment,
 * including tokens that were top-level on the v2 paymentOrder response.
 *
 * @api
 */
interface PaidInterface extends LinkResourceInterface
{
    const NUMBER = 'number';
    const INSTRUMENT = 'instrument';
    const PAYEE_REFERENCE = 'payee_reference';
    const TRANSACTION_TYPE = 'transaction_type';
    const AMOUNT = 'amount';
    const SUBMITTED_AMOUNT = 'submitted_amount';
    const FEE_AMOUNT = 'fee_amount';
    const DISCOUNT_AMOUNT = 'discount_amount';

    const PAYMENT_TOKEN = 'payment_token';
    const RECURRENCE_TOKEN = 'recurrence_token';
    const UNSCHEDULED_TOKEN = 'unscheduled_token';
    const NON_PAYMENT_TOKEN = 'non_payment_token';
    const EXTERNAL_NON_PAYMENT_TOKEN = 'external_non_payment_token';
    const TRANSACTIONS_ON_FILE_TOKEN = 'transactions_on_file_token';

    const DETAILS = 'details';

    /** @return int|null */
    public function getNumber();

    /** @return string|null */
    public function getInstrument();

    /** @return string|null */
    public function getPayeeReference();

    /** @return string|null */
    public function getTransactionType();

    /** @return int|null */
    public function getAmount();

    /** @return int|null */
    public function getSubmittedAmount();

    /** @return int|null */
    public function getFeeAmount();

    /** @return int|null */
    public function getDiscountAmount();

    /** @return string|null */
    public function getPaymentToken();

    /** @return string|null */
    public function getRecurrenceToken();

    /** @return string|null */
    public function getUnscheduledToken();

    /** @return string|null */
    public function getNonPaymentToken();

    /** @return string|null */
    public function getExternalNonPaymentToken();

    /** @return string|null */
    public function getTransactionsOnFileToken();

    /** @return DetailsInterface|null */
    public function getDetails();
}
