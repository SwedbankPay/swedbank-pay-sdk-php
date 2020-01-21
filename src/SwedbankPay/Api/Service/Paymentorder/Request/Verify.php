<?php

namespace PayEx\Api\Service\Paymentorder\Request;

use PayEx\Api\Service\Request;

class Verify extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/paymentorders');
        $this->setServiceOperation('Verify');
    }
}
