<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\ItemDescriptionCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\VatSummaryCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request\Data\TransactionInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\TransactionTrait;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

/**
 * Transaction data object
 */
class Transaction extends RequestResource implements TransactionInterface
{
    use TransactionTrait;

    /**
     * @return OrderItemsCollection
     */
    public function getOrderItems()
    {
        return $this->offsetGet(self::ORDER_ITEMS);
    }

    /**
     * @param OrderItemsCollection|array $orderItems
     * @return $this
     */
    public function setOrderItems($orderItems)
    {
        if (!($orderItems instanceof OrderItemsCollection)) {
            $orderItems = new OrderItemsCollection($orderItems);
        }

        return $this->offsetSet(self::ORDER_ITEMS, $orderItems);
    }

    /**
     * @return ItemDescriptionCollection
     */
    public function getItemDescriptions()
    {
        return $this->offsetGet(self::ITEM_DESCRIPTIONS);
    }

    /**
     * @param ItemDescriptionCollection|array $itemDescriptions
     * @return $this
     */
    public function setItemDescriptions($itemDescriptions)
    {
        return $this->offsetSet(self::ITEM_DESCRIPTIONS, $itemDescriptions);
    }

    /**
     * @return VatSummaryCollection $this
     */
    public function getVatSummary()
    {
        return $this->offsetGet(self::VAT_SUMMARY);
    }

    /**
     * @param VatSummaryCollection|array $vatSummary
     * @return $this
     */
    public function setVatSummary($vatSummary)
    {
        return $this->offsetSet(self::VAT_SUMMARY, $vatSummary);
    }
}
