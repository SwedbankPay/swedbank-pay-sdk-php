<?php

namespace SwedbankPay\Api\Service\Trustly\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class GetReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/trustly/payments/%s/reversals/%s');
    }
}
