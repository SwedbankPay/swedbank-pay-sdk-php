<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item;

use SwedbankPay\Framework\DataObjectCollectionItem;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\Data\DescriptionItemInterface;

class DescriptionItem extends DataObjectCollectionItem implements DescriptionItemInterface
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
        return $this->offsetSet(self::AMOUNT, $amount);
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
        return $this->offsetSet(self::DESCRIPTION, $description);
    }
}
