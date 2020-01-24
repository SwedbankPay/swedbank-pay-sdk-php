<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\CaptureInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\ItemDescriptionListCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\VatSummaryCollection;

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
     * @return ItemDescriptionListCollection
     */
    public function getItemDescriptions()
    {
        return $this->offsetGet(self::ITEM_DESCRIPTIONS);
    }

    /**
     * @param ItemDescriptionListCollection|array $itemDescriptions
     * @return $this
     */
    public function setItemDescriptions($itemDescriptions)
    {
        if (!($itemDescriptions instanceof ItemDescriptionListCollection)) {
            $itemDescriptions = new ItemDescriptionListCollection($itemDescriptions);
        }

        return $this->offsetSet(self::ITEM_DESCRIPTIONS, $itemDescriptions);
    }

    /**
     * @return VatSummaryCollection
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
        if (!($vatSummary instanceof VatSummaryCollection)) {
            $vatSummary = new VatSummaryCollection($vatSummary);
        }

        return $this->offsetSet(self::VAT_SUMMARY, $vatSummary);
    }
}
