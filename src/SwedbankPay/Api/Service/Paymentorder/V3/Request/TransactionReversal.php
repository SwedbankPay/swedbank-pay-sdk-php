<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Request;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;
use SwedbankPay\Api\Service\Request;

/**
 * Reverse (refund) a captured paymentOrder via v3.1.
 *
 * Discovers the reversal endpoint from the paymentOrder's `operations[]` (rel = `reversal`).
 * Supports partial reversals via the request body amount; multiple consecutive failed
 * reversal attempts (>5) lock the payment and require Swedbank Pay support to unlock.
 */
class TransactionReversal extends Request
{
    public function setup()
    {
        $this->setOperationRel('reversal');
        $this->setResponseResourceFQCN(PaymentorderResponse::class);
    }
}
