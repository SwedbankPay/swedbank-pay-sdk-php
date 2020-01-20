<?php

namespace SwedbankPay\Api\Service\Vipps\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class GetCapture extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/vippsv1/payments/%s/captures/%s');
    }
}
