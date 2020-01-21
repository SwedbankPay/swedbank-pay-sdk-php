<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Collection;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\PaymentorderItem;
use SwedbankPay\Framework\DataObjectCollection;

class PaymentorderItemsCollection extends DataObjectCollection
{
    const ITEMS_ITEM_FQCN = PaymentorderItem::class;

    public function __construct(array $items = [], $itemFqcn = self::ITEMS_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
