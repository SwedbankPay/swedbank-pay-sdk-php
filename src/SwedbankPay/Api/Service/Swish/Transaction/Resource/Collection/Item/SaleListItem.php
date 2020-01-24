<?php

namespace SwedbankPay\Api\Service\Swish\Transaction\Resource\Collection\Item;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\TransactionListItem;
use SwedbankPay\Api\Service\Swish\Transaction\Resource\Collection\Item\Data\SaleListItemInterface;

class SaleListItem extends TransactionListItem implements SaleListItemInterface
{
    /**
     * @return string
     */
    public function getDate()
    {
        return $this->offsetGet(self::DATE);
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->offsetSet(self::DATE, $date);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPayerAlias()
    {
        return $this->offsetGet(self::PAYER_ALIAS);
    }

    /**
     * @param string $payerAlias
     * @return $this
     */
    public function setPayerAlias($payerAlias)
    {
        $this->offsetSet(self::PAYER_ALIAS, $payerAlias);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSwishPaymentReference()
    {
        return $this->offsetGet(self::SWISH_PAYMENT_REFERENCE);
    }

    /**
     * @param string $swishPaymentRef
     * @return $this
     */
    public function setSwishPaymentReference($swishPaymentRef)
    {
        $this->offsetSet(self::SWISH_PAYMENT_REFERENCE, $swishPaymentRef);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSwishStatus()
    {
        return $this->offsetGet(self::SWISH_STATUS);
    }

    /**
     * @param string $swishStatus
     * @return $this
     */
    public function setSwishStatus($swishStatus)
    {
        $this->offsetSet(self::SWISH_STATUS, $swishStatus);
        return $this;
    }
}
