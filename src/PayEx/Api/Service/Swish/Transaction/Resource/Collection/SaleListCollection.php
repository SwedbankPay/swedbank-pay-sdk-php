<?php

namespace PayEx\Api\Service\Swish\Transaction\Resource\Collection;

use PayEx\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;
use PayEx\Api\Service\Swish\Transaction\Resource\Collection\Item\SaleListItem;

class SaleListCollection extends TransactionListCollection
{
    const SALE_LIST_ITEM_FQCN = SaleListItem::class;

    public function __construct(array $items = [], $itemFqcn = self::SALE_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
