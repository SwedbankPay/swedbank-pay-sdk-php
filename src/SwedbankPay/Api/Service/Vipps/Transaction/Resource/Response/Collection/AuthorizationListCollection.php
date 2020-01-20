<?php

namespace PayEx\Api\Service\Vipps\Transaction\Resource\Response\Collection;

use PayEx\Api\Service\Vipps\Transaction\Resource\Response\Collection\Item\AuthorizationListItem;
use PayEx\Framework\DataObjectCollection;

class AuthorizationListCollection extends DataObjectCollection
{
    const AUTHORIZATION_LIST_ITEM_FQCN = AuthorizationListItem::class;

    public function __construct($items = [], $itemFqcn = self::AUTHORIZATION_LIST_ITEM_FQCN)
    {
        parent::__construct($items, $itemFqcn);
    }
}
