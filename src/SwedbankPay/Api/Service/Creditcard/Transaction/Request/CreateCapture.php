<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CaptureObject;
use SwedbankPay\Api\Service\Request;

class CreateCapture extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-capture');
        $this->setResponseResourceFQCN(CaptureObject::class);
    }
}
