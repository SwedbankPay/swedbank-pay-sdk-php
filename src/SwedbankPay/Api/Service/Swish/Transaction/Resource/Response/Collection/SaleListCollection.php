<?php

namespace PayEx\Api\Service\Swish\Transaction\Resource\Response\Collection;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\TransactionListCollection;
use PayEx\Api\Service\Swish\Transaction\Resource\Response\Collection\Item\SaleListItem;

class SaleListCollection extends TransactionListCollection
{
    const SALE_LIST_ITEM_FQCN = SaleListItem::class;

    public function __construct(array $items = [], $itemFqcn = self::SALE_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
