<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\TransferInterface;

/**
 * Transaction Reversal Interface
 *
 * @api
 */
interface ReversalInterface extends TransferInterface
{
    const ACTIVITY = 'activity';
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
