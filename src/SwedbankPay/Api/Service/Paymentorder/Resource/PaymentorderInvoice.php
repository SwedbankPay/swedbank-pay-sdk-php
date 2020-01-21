<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderInvoiceInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payment order invoice data object
 */
class PaymentorderInvoice extends Resource implements PaymentorderInvoiceInterface
{
    /**
     * @return int
     */
    public function getFeeAmount()
    {
        return $this->offsetGet(self::FEE_AMOUNT);
    }

    /**
     * @param int $feeAmount
     * @return $this
     */
    public function setFeeAmount($feeAmount)
    {
        return $this->offsetSet(self::FEE_AMOUNT, $feeAmount);
    }
}
