<?php

namespace SwedbankPay\Api\Service\Invoice\Request;

use SwedbankPay\Api\Service\Request;

class CreateInvoice extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/invoice/payments');
        $this->setServiceOperation('FinancingConsumer');
    }
}
