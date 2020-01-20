<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\Data\TransactionListItemInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\TransactionTrait;
use PayEx\Api\Service\Resource\ResponseTrait;
use PayEx\Framework\DataObjectCollectionItem;

class TransactionListItem extends DataObjectCollectionItem implements TransactionListItemInterface
{
    use TransactionTrait;

    use ResponseTrait;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $resourceId
     * @return $this
     */
    public function setId($resourceId)
    {
        $this->offsetSet(self::ID, $resourceId);
        return $this;
    }
}
