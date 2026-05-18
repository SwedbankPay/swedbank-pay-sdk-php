<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data;

/**
 * Top-level `paymentOrder` object returned by every Online Payments v3.1 endpoint.
 *
 * @api
 */
interface PaymentOrderInterface extends LinkResourceInterface
{
    const CREATED = 'created';
    const UPDATED = 'updated';
    const OPERATION = 'operation';
    const STATUS = 'status';
    const NUMBER = 'number';
    const INSTRUMENT = 'instrument';
    const CURRENCY = 'currency';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';
    const REMAINING_REVERSAL_AMOUNT = 'remaining_reversal_amount';
    const REMAINING_CAPTURE_AMOUNT = 'remaining_capture_amount';
    const REMAINING_CANCELLATION_AMOUNT = 'remaining_cancellation_amount';
    const DESCRIPTION = 'description';
    const INITIATING_SYSTEM_USER_AGENT = 'initiating_system_user_agent';
    const LANGUAGE = 'language';
    const AVAILABLE_INSTRUMENTS = 'available_instruments';
    const IMPLEMENTATION = 'implementation';
    const INTEGRATION = 'integration';
    const INSTRUMENT_MODE = 'instrument_mode';
    const GUEST_MODE = 'guest_mode';

    const ORDER_ITEMS = 'order_items';
    const URLS = 'urls';
    const PAYEE_INFO = 'payee_info';
    const PAYER = 'payer';
    const HISTORY = 'history';
    const FAILED = 'failed';
    const ABORTED = 'aborted';
    const PAID = 'paid';
    const CANCELLED = 'cancelled';
    const REVERSED = 'reversed';
    const FINANCIAL_TRANSACTIONS = 'financial_transactions';
    const FAILED_ATTEMPTS = 'failed_attempts';
    const POST_PURCHASE_FAILED_ATTEMPTS = 'post_purchase_failed_attempts';
    const METADATA = 'metadata';

    /** @return string|null ISO-8601 */
    public function getCreated();

    /** @return string|null ISO-8601 */
    public function getUpdated();

    /** @return string|null e.g. "Purchase", "Verify", "UnscheduledPurchase" */
    public function getOperation();

    /** @return string|null Initialized | Paid | Aborted | Failed | Reversed | Cancelled */
    public function getStatus();

    /** @return int|null Present on callback payloads and some response shapes. */
    public function getNumber();

    /** @return string|null Present on callback payloads (e.g. "CreditCard"). */
    public function getInstrument();

    /** @return string|null ISO-4217 */
    public function getCurrency();

    /** @return int|null */
    public function getAmount();

    /** @return int|null */
    public function getVatAmount();

    /** @return int|null */
    public function getRemainingReversalAmount();

    /** @return int|null */
    public function getRemainingCaptureAmount();

    /** @return int|null */
    public function getRemainingCancellationAmount();

    /** @return string|null */
    public function getDescription();

    /** @return string|null */
    public function getInitiatingSystemUserAgent();

    /** @return string|null */
    public function getLanguage();

    /** @return array|null */
    public function getAvailableInstruments();

    /** @return string|null e.g. "PaymentsOnly" */
    public function getImplementation();

    /** @return string|null Redirect | HostedView */
    public function getIntegration();

    /** @return bool|null */
    public function getInstrumentMode();

    /** @return bool|null */
    public function getGuestMode();

    /** @return OrderItemsInterface|null */
    public function getOrderItems();

    /** @return UrlsInterface|null */
    public function getUrls();

    /** @return PayeeInfoInterface|null */
    public function getPayeeInfo();

    /** @return PayerInterface|null */
    public function getPayer();

    /** @return HistoryInterface|null */
    public function getHistory();

    /** @return FailedInterface|null */
    public function getFailed();

    /** @return AbortedInterface|null */
    public function getAborted();

    /** @return PaidInterface|null */
    public function getPaid();

    /** @return CancelledInterface|null */
    public function getCancelled();

    /** @return ReversedInterface|null */
    public function getReversed();

    /** @return FinancialTransactionsInterface|null */
    public function getFinancialTransactions();

    /** @return FailedAttemptsInterface|null */
    public function getFailedAttempts();

    /** @return PostPurchaseFailedAttemptsInterface|null */
    public function getPostPurchaseFailedAttempts();

    /** @return MetadataInterface|null */
    public function getMetadata();
}
