<?php

namespace PayEx\Api\Service\Invoice\Transaction\Request;

use PayEx\Api\Service\Request;

class GetCancellation extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/invoice/payments/%s/cancellations/%s');
    }
}
