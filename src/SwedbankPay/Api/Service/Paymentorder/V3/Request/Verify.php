<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Request;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;
use SwedbankPay\Api\Service\Request;

/**
 * Verify a payment method (zero-amount authorization, e.g. for subscription approval) via v3.1.
 */
class Verify extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/paymentorders');
        $this->setServiceOperation('Verify');
        $this->setResponseResourceFQCN(PaymentorderResponse::class);
    }
}
