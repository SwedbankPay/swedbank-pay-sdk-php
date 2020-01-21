<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Collection;

use PayEx\Api\Service\Paymentorder\Resource\Collection\Item\OrderItem;
use PayEx\Framework\DataObjectCollection;

class OrderItemsCollection extends DataObjectCollection
{
    const ORDER_ITEM_FQCN = OrderItem::class;

    public function __construct(array $items = [], $itemFqcn = self::ORDER_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
