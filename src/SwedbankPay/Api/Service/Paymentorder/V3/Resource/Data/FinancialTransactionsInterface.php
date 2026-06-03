<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\FinancialTransactionsListCollection;

/**
 * v3.1 `financialTransactions` sub-resource. Returned as a link stub unless expanded
 * via `?$expand=financialtransactions`. When expanded, exposes the full list of post-purchase
 * actions (Capture, Cancellation, Reversal) performed against the paymentOrder.
 *
 * @api
 */
interface FinancialTransactionsInterface extends LinkResourceInterface
{
    const FINANCIAL_TRANSACTIONS_LIST = 'financial_transactions_list';

    /** @return FinancialTransactionsListCollection|null */
    public function getFinancialTransactionsList();
}
