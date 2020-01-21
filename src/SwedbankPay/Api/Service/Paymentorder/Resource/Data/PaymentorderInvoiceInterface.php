<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payment order invoice interface
 *
 * @api
 */
interface PaymentorderInvoiceInterface extends ResourceInterface
{

    const FEE_AMOUNT = 'fee_amount';

    /**
     * @return int
     */
    public function getFeeAmount();

    /**
     * @param int $feeAmount
     * @return $this
     */
    public function setFeeAmount($feeAmount);
}
