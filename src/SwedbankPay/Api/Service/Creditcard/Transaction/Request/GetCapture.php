<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CaptureObject;
use SwedbankPay\Api\Service\Request;

class GetCapture extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/captures/%s');
        $this->setResponseResourceFQCN(CaptureObject::class);
    }
}
