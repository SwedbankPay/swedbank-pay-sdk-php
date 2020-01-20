<?php

namespace SwedbankPay\Api\Service\Vipps\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class CreateReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/vippsv1/payments/%s/reversals');
    }
}
