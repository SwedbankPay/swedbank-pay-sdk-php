<?php

namespace PayEx\Api\Service\Paymentorder\Request;

use PayEx\Api\Service\Request;

class UpdateOrder extends Request
{
    public function setup()
    {
        $this->setRequestMethod('PATCH');
        $this->setRequestEndpoint('/psp/paymentorders/%s');
        $this->setServiceOperation('UpdateOrder');
    }
}
