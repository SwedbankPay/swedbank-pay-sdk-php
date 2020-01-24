<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Collection;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\OrderItem;
use SwedbankPay\Framework\DataObjectCollection;

class OrderItemsCollection extends DataObjectCollection
{
    const ORDER_ITEM_FQCN = OrderItem::class;

    public function __construct(array $items = [], $itemFqcn = self::ORDER_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
