<?php

namespace PayEx\Api\Service\Invoice\Request;

use PayEx\Api\Service\Request;

class CreateInvoice extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/invoice/payments');
        $this->setServiceOperation('FinancingConsumer');
    }
}
