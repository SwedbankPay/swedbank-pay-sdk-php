<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class CreateCancellation extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/invoice/payments/%s/cancellations');
    }
}
