<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Request;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;
use SwedbankPay\Api\Service\Request;

/**
 * GET an existing paymentOrder via v3.1.
 *
 * Use `setExpands(['financialtransactions', 'paid'])` to inline sub-resources you need.
 */
class GetPaymentorder extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setResponseResourceFQCN(PaymentorderResponse::class);
    }
}
