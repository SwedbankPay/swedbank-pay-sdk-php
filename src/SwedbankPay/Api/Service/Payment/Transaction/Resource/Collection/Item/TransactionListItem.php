<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data\TransactionListItemInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionTrait;
use SwedbankPay\Api\Service\Resource\ResponseTrait;
use SwedbankPay\Framework\DataObjectCollectionItem;

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
