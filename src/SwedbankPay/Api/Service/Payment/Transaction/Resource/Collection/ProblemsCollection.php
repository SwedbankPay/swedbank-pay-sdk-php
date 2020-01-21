<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\ProblemsItem;
use SwedbankPay\Framework\DataObjectCollection;

class ProblemsCollection extends DataObjectCollection
{
    const PROBLEMS_ITEM_FQCN = ProblemsItem::class;

    public function __construct(array $items = [], $itemFqcn = self::PROBLEMS_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
