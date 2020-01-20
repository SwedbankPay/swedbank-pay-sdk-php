<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\ItemDescriptionListItem;
use PayEx\Framework\DataObjectCollection;

class ItemDescriptionListCollection extends DataObjectCollection
{
    const ITEM_DESCRIPTION_LIST_ITEM_FQCN = ItemDescriptionListItem::class;

    public function __construct(array $items = [], $itemFqcn = self::ITEM_DESCRIPTION_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
