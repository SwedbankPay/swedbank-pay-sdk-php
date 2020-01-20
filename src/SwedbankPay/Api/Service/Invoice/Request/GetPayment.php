<?php

namespace SwedbankPay\Api\Service\Invoice\Request;

use SwedbankPay\Api\Service\Payment\Resource\Response\PaymentObject;
use SwedbankPay\Api\Service\Request;

class GetPayment extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/invoice/payments/%s');
        $this->setResponseResourceFQCN(PaymentObject::class);
    }
}
