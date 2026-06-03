<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\Item\Data;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\OrderItemsInterface;
use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

/**
 * One entry in the v3.1 `paymentOrder.financialTransactions.financialTransactionsList[]`
 * — represents a single Capture, Cancel, or Reversal performed against the paymentOrder.
 *
 * @api
 */
interface FinancialTransactionInterface extends DataObjectCollectionItemInterface
{
    const ID = 'id';
    const CREATED = 'created';
    const UPDATED = 'updated';
    const TYPE = 'type';
    const NUMBER = 'number';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';
    const DESCRIPTION = 'description';
    const PAYEE_REFERENCE = 'payee_reference';
    const ORDER_ITEMS = 'order_items';

    /** @return string|null */
    public function getId();

    /** @param string $resourceId @return $this */
    public function setId($resourceId);

    /** @return string|null */
    public function getCreated();

    /** @return string|null */
    public function getUpdated();

    /** @return string|null Capture | Cancellation | Reversal */
    public function getType();

    /** @return int|null */
    public function getNumber();

    /** @return int|null */
    public function getAmount();

    /** @return int|null */
    public function getVatAmount();

    /** @return string|null */
    public function getDescription();

    /** @return string|null */
    public function getPayeeReference();

    /** @return OrderItemsInterface|null Link stub unless expanded. */
    public function getOrderItems();
}
