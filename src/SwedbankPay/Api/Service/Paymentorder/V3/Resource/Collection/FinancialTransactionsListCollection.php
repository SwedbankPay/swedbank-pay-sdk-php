<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\Item\FinancialTransaction;
use SwedbankPay\Framework\DataObjectCollection;

/**
 * Typed collection of FinancialTransaction items found at
 * `paymentOrder.financialTransactions.financialTransactionsList`.
 */
class FinancialTransactionsListCollection extends DataObjectCollection
{
    const FINANCIAL_TRANSACTIONS_LIST_ITEM_FQCN = FinancialTransaction::class;

    public function __construct(array $items = [], $itemFqcn = self::FINANCIAL_TRANSACTIONS_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
