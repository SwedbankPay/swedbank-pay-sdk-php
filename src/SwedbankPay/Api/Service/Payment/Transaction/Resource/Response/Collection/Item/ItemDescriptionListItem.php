<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\Data\ItemDescriptionListItemInterface;
use PayEx\Framework\DataObjectCollectionItem;

class ItemDescriptionListItem extends DataObjectCollectionItem implements ItemDescriptionListItemInterface
{
    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->offsetGet(self::AMOUNT);
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->offsetSet(self::AMOUNT, $amount);
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->offsetGet(self::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->offsetSet(self::DESCRIPTION, $description);
        return $this;
    }
}
