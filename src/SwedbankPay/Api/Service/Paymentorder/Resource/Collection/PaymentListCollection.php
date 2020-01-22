<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Collection;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\PaymentListItem;
use SwedbankPay\Framework\DataObjectCollection;

class PaymentListCollection extends DataObjectCollection
{
    const PAYMENT_LIST_ITEM_FQCN = PaymentListItem::class;

    public function __construct(array $items = [], $itemFqcn = self::PAYMENT_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
