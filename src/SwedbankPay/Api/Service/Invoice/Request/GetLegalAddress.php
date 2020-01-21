<?php

namespace PayEx\Api\Service\Invoice\Request;

use PayEx\Api\Service\Request;

class GetLegalAddress extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/invoice/payments/%s/legaladdress');
    }
}
