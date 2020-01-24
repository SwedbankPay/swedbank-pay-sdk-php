<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\VatSummaryItem;
use SwedbankPay\Framework\DataObjectCollection;

class VatSummaryCollection extends DataObjectCollection
{
    const VAT_SUMMARY_ITEM_FQCN = VatSummaryItem::class;

    public function __construct(array $items = [], $itemFqcn = self::VAT_SUMMARY_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
