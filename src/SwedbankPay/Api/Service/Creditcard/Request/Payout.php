<?php

namespace SwedbankPay\Api\Service\Creditcard\Request;

use SwedbankPay\Api\Service\Request;

class Payout extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/creditcard/payments');
        $this->setServiceOperation('Payout');
    }
}
