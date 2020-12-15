<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\ItemDescriptionListCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\VatSummaryCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\TransferInterface;

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
    const RECEIPT_REFERENCE = 'receiptReference';

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
     * @return ItemDescriptionListCollection
     */
    public function getItemDescriptions();

    /**
     * @param ItemDescriptionListCollection|array $itemDescriptions
     * @return $this
     */
    public function setItemDescriptions($itemDescriptions);

    /**
     * @return VatSummaryCollection
     */
    public function getVatSummary();

    /**
     * @param VatSummaryCollection $vatSummary
     * @return $this
     */
    public function setVatSummary($vatSummary);

    /**
     * Get Receipt Reference.
     * The receiptReference is a reference from the merchant system.
     * This reference is used as an invoice/receipt number to supplement payeeReference.
     *
     * @return string|null
     */
    public function getReceiptReference();

    /**
     * Set Receipt Reference.
     * The receiptReference is a reference from the merchant system.
     * This reference is used as an invoice/receipt number to supplement payeeReference.
     *
     * @param string $reference
     *
     * @return $this
     */
    public function setReceiptReference($reference);
}
