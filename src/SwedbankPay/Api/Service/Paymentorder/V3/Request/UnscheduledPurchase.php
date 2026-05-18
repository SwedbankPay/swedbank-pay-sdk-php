<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Request;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;
use SwedbankPay\Api\Service\Request;

/**
 * Charge an existing unscheduled token (subscription renewal) via v3.1.
 */
class UnscheduledPurchase extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/paymentorders');
        $this->setServiceOperation('UnscheduledPurchase');
        $this->setResponseResourceFQCN(PaymentorderResponse::class);
    }
}
