<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Request;

use SwedbankPay\Api\Service\Request;

class GetTransaction extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/invoice/payments/%s/transactions/%s');
    }
}
