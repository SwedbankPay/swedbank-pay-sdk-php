<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection;

use SwedbankPay\Framework\DataObjectCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\VatSummaryItem;

class VatSummaryCollection extends DataObjectCollection
{
    const VAT_SUMMARY_ITEM_FQCN = VatSummaryItem::class;

    public function __construct(array $items = [], $itemFqcn = self::VAT_SUMMARY_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
