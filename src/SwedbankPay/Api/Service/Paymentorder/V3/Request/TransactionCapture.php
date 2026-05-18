<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Request;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;
use SwedbankPay\Api\Service\Request;

/**
 * Capture an authorized paymentOrder via v3.1.
 *
 * Discovers the capture endpoint from the paymentOrder's `operations[]` (rel = `capture`).
 * The response is a {@see PaymentorderResponse}; call
 * `setExpands(['financialtransactions', 'paid'])` to inline the freshly-created capture
 * record without an extra round trip.
 */
class TransactionCapture extends Request
{
    public function setup()
    {
        $this->setOperationRel('capture');
        $this->setResponseResourceFQCN(PaymentorderResponse::class);
    }
}
