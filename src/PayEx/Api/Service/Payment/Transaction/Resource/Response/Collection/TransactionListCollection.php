<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\TransactionListItem;
use PayEx\Framework\DataObjectCollection;

class TransactionListCollection extends DataObjectCollection
{
    const TRANSACTION_LIST_ITEM_FQCN = TransactionListItem::class;

    public function __construct(array $items = [], $itemFqcn = self::TRANSACTION_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
