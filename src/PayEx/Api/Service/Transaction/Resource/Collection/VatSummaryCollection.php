<?php

namespace PayEx\Api\Service\Transaction\Resource\Collection;

use PayEx\Framework\DataObjectCollection;
use PayEx\Api\Service\Transaction\Resource\Collection\Item\VatSummaryItem;

class VatSummaryCollection extends DataObjectCollection
{
    const VAT_SUMMARY_ITEM_FQCN = VatSummaryItem::class;

    public function __construct(array $items = [], $itemFqcn = self::VAT_SUMMARY_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
