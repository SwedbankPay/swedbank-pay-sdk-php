<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\Data\OrderItemInterface;
use SwedbankPay\Framework\DataObjectCollectionItem;

class OrderItem extends DataObjectCollectionItem implements OrderItemInterface
{
    /**
     * @return string
     */
    public function getReference()
    {
        return $this->offsetGet(self::REFERENCE);
    }

    /**
     * @param string $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->offsetSet(self::REFERENCE, $reference);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->offsetGet(self::NAME);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->offsetSet(self::NAME, $name);
        return $this;
    }
    
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
        $this->offsetSet(self::TYPE, $type);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getItemClass()
    {
        return $this->offsetGet(self::ITEM_CLASS);
    }

    /**
     * @param string $itemClass
     * @return $this
     */
    public function setItemClass($itemClass)
    {
        $this->offsetSet(self::ITEM_CLASS, $itemClass);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getItemUrl()
    {
        return $this->offsetGet(self::ITEM_URL);
    }

    /**
     * @param string $itemUrl
     * @return $this
     */
    public function setItemUrl($itemUrl)
    {
        $this->offsetSet(self::ITEM_URL, $itemUrl);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->offsetGet(self::IMAGE_URL);
    }

    /**
     * @param string $imageUrl
     * @return $this
     */
    public function setImageUrl($imageUrl)
    {
        $this->offsetSet(self::IMAGE_URL, $imageUrl);
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
    
    /**
     * @return string
     */
    public function getDiscountDescription()
    {
        return $this->offsetGet(self::DISCOUNT_DESCRIPTION);
    }

    /**
     * @param string $discountDescription
     * @return $this
     */
    public function setDiscountDescription($discountDescription)
    {
        $this->offsetSet(self::DISCOUNT_DESCRIPTION, $discountDescription);
        return $this;
    }
    
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->offsetGet(self::QUANTITY);
    }

    /**
     * @param int $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->offsetSet(self::QUANTITY, $quantity);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getQuantityUnit()
    {
        return $this->offsetGet(self::QUANTITY_UNIT);
    }

    /**
     * @param string $quantityUnit
     * @return $this
     */
    public function setQuantityUnit($quantityUnit)
    {
        $this->offsetSet(self::QUANTITY_UNIT, $quantityUnit);
        return $this;
    }
    
    /**
     * @return int
     */
    public function getUnitPrice()
    {
        return $this->offsetGet(self::UNIT_PRICE);
    }

    /**
     * @param int $unitPrice
     * @return $this
     */
    public function setUnitPrice($unitPrice)
    {
        $this->offsetSet(self::UNIT_PRICE, $unitPrice);
        return $this;
    }
    
    /**
     * @return int
     */
    public function getDiscountPrice()
    {
        return $this->offsetGet(self::DISCOUNT_PRICE);
    }

    /**
     * @param int $discountPrice
     * @return $this
     */
    public function setDiscountPrice($discountPrice)
    {
        $this->offsetSet(self::DISCOUNT_PRICE, $discountPrice);
        return $this;
    }
    
    /**
     * @return int
     */
    public function getVatPercent()
    {
        return $this->offsetGet(self::VAT_PERCENT);
    }

    /**
     * @param int $vatPercent
     * @return $this
     */
    public function setVatPercent($vatPercent)
    {
        $this->offsetSet(self::VAT_PERCENT, $vatPercent);
        return $this;
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
        $this->offsetSet(self::AMOUNT, $amount);
        return $this;
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
        $this->offsetSet(self::VAT_AMOUNT, $vatAmount);
        return $this;
    }
}
