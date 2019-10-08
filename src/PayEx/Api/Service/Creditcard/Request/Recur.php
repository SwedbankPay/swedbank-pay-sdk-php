<?php

namespace PayEx\Api\Service\Creditcard\Request;

use PayEx\Api\Service\Request;

class Recur extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/creditcard/payments');
        $this->setServiceOperation('Recur');
    }
}
