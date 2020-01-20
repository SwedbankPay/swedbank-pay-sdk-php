<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Collection\Item;

use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\Data\PriceItemInterface;
use SwedbankPay\Framework\DataObjectCollectionItem;

/**
 * Swish payment price data object
 */
class PriceItem extends DataObjectCollectionItem implements PriceItemInterface
{
    /**
     * @return string
     */
    public function getType()
    {
        return $this->offsetGet(self::TYPE);
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        return $this->offsetSet(self::TYPE, $type);
    }

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
     * @return int
     */
    public function getVatAmount()
    {
        return $this->offsetGet(self::VAT_AMOUNT);
    }

    /**
     * @param int $vatAmount
     * @return $this
     */
    public function setVatAmount($vatAmount)
    {
        return $this->offsetSet(self::VAT_AMOUNT, $vatAmount);
    }
}
