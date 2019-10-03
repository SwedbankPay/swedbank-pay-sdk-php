<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\VatSummaryItem;
use PayEx\Framework\DataObjectCollection;

class VatSummaryCollection extends DataObjectCollection
{
    const VAT_SUMMARY_ITEM_FQCN = VatSummaryItem::class;

    public function __construct(array $items = [], $itemFqcn = self::VAT_SUMMARY_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
