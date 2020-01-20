<?php

namespace PayEx\Api\Service\Invoice\Transaction\Resource\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use PayEx\Api\Service\Invoice\Transaction\Resource\Request\Data\CaptureInterface;
use PayEx\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\Data\DescriptionItemInterface;
use PayEx\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\Data\VatSummaryItemInterface;
use PayEx\Api\Service\Paymentorder\Transaction\Resource\Collection\ItemDescriptionCollection;
use PayEx\Api\Service\Paymentorder\Transaction\Resource\Collection\VatSummaryCollection;

/**
 * Transaction capture data object
 */
class Capture extends Transfer implements CaptureInterface
{
    /**
     * @return string
     */
    public function getActivity()
    {
        return $this->offsetGet(self::ACTIVITY);
    }

    /**
     * @param string $activity
     * @return $this
     */
    public function setActivity($activity)
    {
        return $this->offsetSet(self::ACTIVITY, $activity);
    }

    /**
     * @return DescriptionItemInterface
     */
    public function getItemDescriptions()
    {
        return $this->offsetGet(self::ITEM_DESCRIPTIONS);
    }

    /**
     * @param DescriptionItemInterface|array $itemDescriptions
     * @return $this
     */
    public function setItemDescriptions($itemDescriptions)
    {
        if (!($itemDescriptions instanceof ItemDescriptionCollection)) {
            $itemDescriptions = new ItemDescriptionCollection($itemDescriptions);
        }

        return $this->offsetSet(self::ITEM_DESCRIPTIONS, $itemDescriptions);
    }

    /**
     * @return VatSummaryItemInterface
     */
    public function getVatSummary()
    {
        return $this->offsetGet(self::VAT_SUMMARY);
    }

    /**
     * @param VatSummaryItemInterface|array $vatSummary
     * @return $this
     */
    public function setVatSummary($vatSummary)
    {
        if (!($vatSummary instanceof VatSummaryCollection)) {
            $vatSummary = new VatSummaryCollection($vatSummary);
        }

        return $this->offsetSet(self::VAT_SUMMARY, $vatSummary);
    }
}
