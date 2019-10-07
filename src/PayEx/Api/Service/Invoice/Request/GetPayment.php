<?php

namespace PayEx\Api\Service\Invoice\Request;

use PayEx\Api\Service\Payment\Resource\Response\PaymentObject;
use PayEx\Api\Service\Request;

class GetPayment extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/invoice/payments/%s');
        $this->setResponseResourceFQCN(PaymentObject::class);
    }
}
