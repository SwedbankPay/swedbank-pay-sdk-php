<?php

namespace SwedbankPay\Api\Service\MobilePay\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CaptureObject;
use SwedbankPay\Api\Service\Request;

class GetCapture extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setResponseResourceFQCN(CaptureObject::class);
    }
}
