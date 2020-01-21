<?php

namespace SwedbankPay\Api\Service\Creditcard\Request;

use SwedbankPay\Api\Service\Request;

class Purchase extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/creditcard/payments');
        $this->setServiceOperation('Purchase');
    }
}
