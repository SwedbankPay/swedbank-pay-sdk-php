<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\ReversalInterface;

/**
 * Transaction reversal data object
 */
class Reversal extends Transfer implements ReversalInterface
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
     * Get Receipt Reference.
     * The receiptReference is a reference from the merchant system.
     * This reference is used as an invoice/receipt number to supplement payeeReference.
     *
     * @return string|null
     */
    public function getReceiptReference()
    {
        return $this->offsetGet(self::RECEIPT_REFERENCE);
    }

    /**
     * Set Receipt Reference.
     * The receiptReference is a reference from the merchant system.
     * This reference is used as an invoice/receipt number to supplement payeeReference.
     *
     * @param string $reference
     *
     * @return $this
     */
    public function setReceiptReference($reference)
    {
        return $this->offsetSet(self::RECEIPT_REFERENCE, $reference);
    }
}
