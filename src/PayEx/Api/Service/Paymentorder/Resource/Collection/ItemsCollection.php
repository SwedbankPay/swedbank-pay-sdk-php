<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Collection;

use PayEx\Api\Service\Paymentorder\Resource\Collection\Item\PaymentorderItem;
use PayEx\Framework\DataObjectCollection;

class ItemsCollection extends DataObjectCollection
{
    const ITEMS_ITEM_FQCN = PaymentorderItem::class;

    public function __construct(array $items = [], $itemFqcn = self::ITEMS_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
