<?php

namespace PayEx\Api\Service\Invoice\Transaction\Request;

use PayEx\Api\Service\Request;

class CreateReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/invoice/payments/%s/reversals');
    }
}
