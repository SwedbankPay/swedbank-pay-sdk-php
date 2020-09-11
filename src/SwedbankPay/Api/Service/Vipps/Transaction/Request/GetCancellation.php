<?php

namespace SwedbankPay\Api\Service\Vipps\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class GetCancellation extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/vippsv1/payments/%s/cancellations/%s');
    }
}
