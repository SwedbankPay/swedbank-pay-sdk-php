<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\Data;

interface OrderItemInterface
{
    const REFERENCE = 'reference';
    const NAME = 'name';
    const TYPE = 'type';
    const ITEM_CLASS = 'class';
    const ITEM_URL = 'item_url';
    const IMAGE_URL = 'image_url';
    const DESCRIPTION = 'description';
    const DISCOUNT_DESCRIPTION = 'discount_description';
    const QUANTITY = 'quantity';
    const QUANTITY_UNIT = 'quantity_unit';
    const UNIT_PRICE = 'unit_price';
    const DISCOUNT_PRICE = 'discount_price';
    const VAT_PERCENT = 'vat_percent';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';

    /**
    * @return string
    */
    public function getReference();
    
    /**
    * @param string $reference
    * @return $this
    */
    public function setReference($reference);
    
    /**
    * @return string
    */
    public function getName();
    
    /**
    * @param string $name
    * @return $this
    */
    public function setName($name);
    
    /**
    * @return string
    */
    public function getType();
    
    /**
    * @param string $type
    * @return $this
    */
    public function setType($type);
    
    /**
    * @return string
    */
    public function getItemClass();
    
    /**
    * @param string $itemClass
    * @return $this
    */
    public function setItemClass($itemClass);
    
    /**
    * @return string
    */
    public function getItemUrl();
    
    /**
    * @param string $itemUrl
    * @return $this
    */
    public function setItemUrl($itemUrl);
    
    /**
    * @return string
    */
    public function getImageUrl();
    
    /**
    * @param string $imageUrl
    * @return $this
    */
    public function setImageUrl($imageUrl);
    
    /**
    * @return string
    */
    public function getDescription();
    
    /**
    * @param string $description
    * @return $this
    */
    public function setDescription($description);
    
    /**
    * @return string
    */
    public function getDiscountDescription();
    
    /**
    * @param string $discountDescription
    * @return $this
    */
    public function setDiscountDescription($discountDescription);
    
    /**
    * @return int
    */
    public function getQuantity();
    
    /**
    * @param int $quantity
    * @return $this
    */
    public function setQuantity($quantity);
    
    /**
    * @return string
    */
    public function getQuantityUnit();
    
    /**
    * @param string $quantityUnit
    * @return $this
    */
    public function setQuantityUnit($quantityUnit);
    
    /**
    * @return int
    */
    public function getUnitPrice();
    
    /**
    * @param int $unitPrice
    * @return $this
    */
    public function setUnitPrice($unitPrice);
    
    /**
    * @return int
    */
    public function getDiscountPrice();
    
    /**
    * @param int $discountPrice
    * @return $this
    */
    public function setDiscountPrice($discountPrice);
    
    /**
    * @return int
    */
    public function getVatPercent();
    
    /**
    * @param int $vatPercent
    * @return $this
    */
    public function setVatPercent($vatPercent);
    
    /**
    * @return int
    */
    public function getAmount();
    
    /**
    * @param int $amount
    * @return $this
    */
    public function setAmount($amount);
    
    /**
    * @return int
    */
    public function getVatAmount();
    
    /**
    * @param int $vatAmount
    * @return $this
    */
    public function setVatAmount($vatAmount);
}
