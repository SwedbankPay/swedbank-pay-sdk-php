<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item\AuthorizationListItem;
use SwedbankPay\Framework\DataObjectCollection;

class AuthorizationListCollection extends DataObjectCollection
{
    const AUTHORIZATION_LIST_ITEM_FQCN = AuthorizationListItem::class;

    public function __construct($items = [], $itemFqcn = self::AUTHORIZATION_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
