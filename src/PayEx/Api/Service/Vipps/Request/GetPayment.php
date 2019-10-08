<?php

namespace PayEx\Api\Service\Vipps\Request;

use PayEx\Api\Service\Payment\Resource\Response\PaymentObject;
use PayEx\Api\Service\Request;

class GetPayment extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/vippsv1/payments/%s');
        $this->setResponseResourceFQCN(PaymentObject::class);
    }
}
