<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CapturesObject;
use SwedbankPay\Api\Service\Request;

class GetCaptures extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/captures');
        $this->setResponseResourceFQCN(CapturesObject::class);
    }
}
