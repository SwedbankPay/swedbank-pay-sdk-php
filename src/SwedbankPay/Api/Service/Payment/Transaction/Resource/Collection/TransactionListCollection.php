<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\TransactionListItem;
use SwedbankPay\Framework\DataObjectCollection;

class TransactionListCollection extends DataObjectCollection
{
    const TRANSACTION_LIST_ITEM_FQCN = TransactionListItem::class;

    public function __construct(array $items = [], $itemFqcn = self::TRANSACTION_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
