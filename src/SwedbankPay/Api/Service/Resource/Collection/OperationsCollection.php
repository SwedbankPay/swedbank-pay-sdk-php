<?php

namespace PayEx\Api\Service\Resource\Collection;

use PayEx\Api\Service\Resource\Collection\Item\OperationsItem;
use PayEx\Framework\DataObjectCollection;

class OperationsCollection extends DataObjectCollection
{
    const OPERATIONS_ITEM_FQCN = OperationsItem::class;

    public function __construct(array $items = [], $itemFqcn = self::OPERATIONS_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
