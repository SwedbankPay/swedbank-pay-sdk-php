<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Request;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;
use SwedbankPay\Api\Service\Request;

/**
 * Cancel an authorized paymentOrder via v3.1.
 *
 * Discovers the cancel endpoint from the paymentOrder's `operations[]` (rel = `cancel`).
 */
class TransactionCancel extends Request
{
    public function setup()
    {
        $this->setOperationRel('cancel');
        $this->setResponseResourceFQCN(PaymentorderResponse::class);
    }
}
