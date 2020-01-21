<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection;

use SwedbankPay\Framework\DataObjectCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\DescriptionItem;

class ItemDescriptionCollection extends DataObjectCollection
{
    const ITEM_DESCRIPTION_ITEM_FQCN = DescriptionItem::class;

    public function __construct(array $items = [], $itemFqcn = self::ITEM_DESCRIPTION_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
