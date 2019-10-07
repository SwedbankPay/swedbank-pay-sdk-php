<?php

namespace PayEx\Api\Service\Invoice\Transaction\Resource\Response\Collection;

use PayEx\Api\Service\Invoice\Transaction\Resource\Response\Collection\Item\CaptureListItem;
use PayEx\Framework\DataObjectCollection;

class CaptureListCollection extends DataObjectCollection
{
    const CAPTURE_LIST_ITEM_FQCN = CaptureListItem::class;

    public function __construct($items = [], $itemFqcn = self::CAPTURE_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
