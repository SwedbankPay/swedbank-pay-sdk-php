<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item;

use SwedbankPay\Framework\DataObjectCollectionItem;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\Data\VatSummaryItemInterface;

/**
 * Transaction vat summary data object
 */
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
        return $this->offsetSet(self::VAT_PERCENT, $vatPercent);
    }
}
