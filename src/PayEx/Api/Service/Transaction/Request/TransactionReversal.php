<?php

namespace PayEx\Api\Service\Transaction\Request;

use PayEx\Api\Service\Request;

class TransactionReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/paymentorders/%s/reversals');
    }
}
