<?php

namespace PayEx\Api\Service\Invoice\Transaction\Resource\Request\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Data\TransferInterface;
use PayEx\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\Data\DescriptionItemInterface;
use PayEx\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\Data\VatSummaryItemInterface;

/**
 * Transaction Capture Interface
 *
 * @api
 */
interface CaptureInterface extends TransferInterface
{
    const ACTIVITY = 'activity';
    const ITEM_DESCRIPTIONS = 'item_descriptions';
    const VAT_SUMMARY = 'vat_summary';

    /**
     * @return string
     */
    public function getActivity();

    /**
     * @param string $activity
     * @return $this
     */
    public function setActivity($activity);

    /**
     * @return DescriptionItemInterface
     */
    public function getItemDescriptions();

    /**
     * @param DescriptionItemInterface|array $itemDescriptions
     * @return $this
     */
    public function setItemDescriptions($itemDescriptions);

    /**
     * @return VatSummaryItemInterface
     */
    public function getVatSummary();

    /**
     * @param VatSummaryItemInterface $vatSummary
     * @return $this
     */
    public function setVatSummary($vatSummary);
}
