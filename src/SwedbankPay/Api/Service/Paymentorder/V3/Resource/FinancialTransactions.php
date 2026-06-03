<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\FinancialTransactionsListCollection;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\FinancialTransactionsInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `financialTransactions` sub-resource of a paymentOrder.
 */
class FinancialTransactions extends ResponseResource implements FinancialTransactionsInterface
{
    use LinkResourceTrait;

    /** @return FinancialTransactionsListCollection|null */
    public function getFinancialTransactionsList()
    {
        return $this->offsetGet(self::FINANCIAL_TRANSACTIONS_LIST);
    }
}
