<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\Data;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\Item\Data\FinancialTransactionInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PaymentOrderInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Top-level response envelope for v3.1 paymentOrder endpoints.
 *
 * Every v3.1 endpoint (Purchase, GET paymentOrder, post-purchase Capture/Cancel/Reversal,
 * Verify, UnscheduledPurchase) returns the same shape: `{ paymentOrder: {...}, operations: [...] }`.
 *
 * @api
 */
interface PaymentorderResponseInterface extends ResponseInterface
{
    const PAYMENT_ORDER = 'payment_order';

    /** @return PaymentOrderInterface|null */
    public function getPaymentOrder();

    /**
     * Convenience: returns the last entry of
     * `paymentOrder.financialTransactions.financialTransactionsList`, or null if not expanded.
     *
     * Useful for post-purchase Capture/Cancel/Reversal callers who want the transaction that
     * was just executed without walking the full nested path.
     *
     * @return FinancialTransactionInterface|null
     */
    public function getLatestFinancialTransaction();
}
