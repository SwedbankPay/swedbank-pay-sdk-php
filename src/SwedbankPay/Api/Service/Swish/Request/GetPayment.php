<?php

namespace PayEx\Api\Service\Swish\Request;

use PayEx\Api\Service\Payment\Resource\Response\PaymentObject;
use PayEx\Api\Service\Request;

class GetPayment extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/swish/payments/%s');
        $this->setResponseResourceFQCN(PaymentObject::class);
    }
}
