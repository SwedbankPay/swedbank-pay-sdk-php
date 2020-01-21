<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\CaptureObject;
use PayEx\Api\Service\Request;

class CreateCapture extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/captures');
        $this->setResponseResourceFQCN(CaptureObject::class);
    }
}
