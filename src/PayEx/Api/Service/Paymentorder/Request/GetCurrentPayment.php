<?php

namespace PayEx\Api\Service\Paymentorder\Request;

use PayEx\Api\Service\Request;

class GetCurrentPayment extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/paymentorders/%s/currentpayment');
    }
}
