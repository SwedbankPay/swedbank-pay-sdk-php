<?php

namespace SwedbankPay\Api\Service\MobilePay\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class GetCapture extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/mobilepay/payments/%s/captures/%s');
    }
}
