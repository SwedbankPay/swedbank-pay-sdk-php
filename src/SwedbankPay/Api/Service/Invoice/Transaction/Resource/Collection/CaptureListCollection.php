<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item\CaptureListItem;
use SwedbankPay\Framework\DataObjectCollection;

class CaptureListCollection extends DataObjectCollection
{
    const CAPTURE_LIST_ITEM_FQCN = CaptureListItem::class;

    public function __construct($items = [], $itemFqcn = self::CAPTURE_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
