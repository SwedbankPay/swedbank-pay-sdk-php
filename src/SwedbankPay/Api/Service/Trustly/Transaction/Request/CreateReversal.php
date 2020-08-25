<?php

namespace SwedbankPay\Api\Service\Trustly\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class CreateReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/trustly/payments/%s/reversals');
    }
}
