<?php

namespace PayEx\Api\Service\Creditcard\Request;

use PayEx\Api\Service\Payment\Resource\Response\PaymentObject;
use PayEx\Api\Service\Request;

class GetPayment extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s');
        $this->setResponseResourceFQCN(PaymentObject::class);
    }
}
