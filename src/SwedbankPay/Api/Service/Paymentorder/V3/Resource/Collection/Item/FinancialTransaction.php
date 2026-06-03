<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\Item;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\Item\Data\FinancialTransactionInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\OrderItemsInterface;
use SwedbankPay\Framework\DataObjectCollectionItem;

/**
 * Single Capture / Cancellation / Reversal entry within a paymentOrder's
 * `financialTransactionsList`.
 */
class FinancialTransaction extends DataObjectCollectionItem implements FinancialTransactionInterface
{
    /** @return string|null */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /** @param string $resourceId @return $this */
    public function setId($resourceId)
    {
        $this->offsetSet(self::ID, $resourceId);
        return $this;
    }

    /** @return string|null */
    public function getCreated()
    {
        return $this->offsetGet(self::CREATED);
    }

    /** @return string|null */
    public function getUpdated()
    {
        return $this->offsetGet(self::UPDATED);
    }

    /** @return string|null */
    public function getType()
    {
        return $this->offsetGet(self::TYPE);
    }

    /** @return int|null */
    public function getNumber()
    {
        return $this->offsetGet(self::NUMBER);
    }

    /** @return int|null */
    public function getAmount()
    {
        return $this->offsetGet(self::AMOUNT);
    }

    /** @return int|null */
    public function getVatAmount()
    {
        return $this->offsetGet(self::VAT_AMOUNT);
    }

    /** @return string|null */
    public function getDescription()
    {
        return $this->offsetGet(self::DESCRIPTION);
    }

    /** @return string|null */
    public function getPayeeReference()
    {
        return $this->offsetGet(self::PAYEE_REFERENCE);
    }

    /** @return OrderItemsInterface|null */
    public function getOrderItems()
    {
        return $this->offsetGet(self::ORDER_ITEMS);
    }
}
