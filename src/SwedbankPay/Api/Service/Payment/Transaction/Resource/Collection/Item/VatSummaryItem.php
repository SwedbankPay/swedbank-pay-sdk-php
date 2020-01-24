<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data\VatSummaryItemInterface;
use SwedbankPay\Framework\DataObjectCollectionItem;

class VatSummaryItem extends DataObjectCollectionItem implements VatSummaryItemInterface
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
