<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class TransactionReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/paymentorders/%s/reversals');
    }
}
