<?php

namespace PayEx\Api\Service\Transaction\Resource\Request;

use PayEx\Api\Service\Resource\Request as RequestResource;
use PayEx\Api\Service\Transaction\Resource\TransactionTrait;
use PayEx\Api\Service\Transaction\Resource\Request\Data\TransactionInterface;
use PayEx\Api\Service\Transaction\Resource\Collection\ItemDescriptionCollection;
use PayEx\Api\Service\Transaction\Resource\Collection\VatSummaryCollection;

/**
 * Transaction data object
 */
class Transaction extends RequestResource implements TransactionInterface
{
    use TransactionTrait;

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
