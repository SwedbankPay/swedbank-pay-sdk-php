<?php

namespace PayEx\Api\Service\Creditcard\Request;

use PayEx\Api\Service\Request;

class RemovePaymentToken extends Request
{
    public function setup()
    {
        $this->setRequestMethod('PATCH');
        $this->setRequestEndpoint('/psp/creditcard/payments/instrumentData/%s');
    }
}
