<?php

namespace PayEx\Api\Service\Paymentorder\Transaction\Request;

use PayEx\Api\Service\Request;

class TransactionCancel extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/paymentorders/%s/cancellations');
    }
}
