<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Collection;

use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Framework\DataObjectCollection;

class PricesCollection extends DataObjectCollection
{
    const ITEMS_ITEM_FQCN = PriceItem::class;

    public function __construct(array $items = [], $itemFqcn = self::ITEMS_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
