<?php

namespace SwedbankPay\Api\Service\Swish\Transaction\Resource\Collection;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;
use SwedbankPay\Api\Service\Swish\Transaction\Resource\Collection\Item\SaleListItem;

class SaleListCollection extends TransactionListCollection
{
    const SALE_LIST_ITEM_FQCN = SaleListItem::class;

    public function __construct(array $items = [], $itemFqcn = self::SALE_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
