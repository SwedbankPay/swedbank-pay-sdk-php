<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\Item\Data\FinancialTransactionInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PaymentOrderInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\Data\PaymentorderResponseInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * Top-level response envelope for every Online Payments v3.1 paymentOrder endpoint.
 *
 * Wraps the nested `paymentOrder` typed object plus the response's `operations[]`.
 * The latter is exposed via the inherited `getOperations()` method (from ResponseTrait).
 */
class PaymentorderResponse extends ResponseResource implements PaymentorderResponseInterface
{
    /** @return PaymentOrderInterface|null */
    public function getPaymentOrder()
    {
        return $this->offsetGet(self::PAYMENT_ORDER);
    }

    /**
     * @return FinancialTransactionInterface|null
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function getLatestFinancialTransaction()
    {
        $paymentOrder = $this->getPaymentOrder();
        if (!$paymentOrder) {
            return null;
        }

        $finTransactions = $paymentOrder->getFinancialTransactions();
        if (!$finTransactions) {
            return null;
        }

        $list = $finTransactions->getFinancialTransactionsList();
        if (!$list) {
            return null;
        }

        $items = $list->getItems();
        if (empty($items)) {
            return null;
        }

        return end($items) ?: null;
    }
}
