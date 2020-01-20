<?php

namespace PayEx\Api\Service\Invoice\Request;

use PayEx\Api\Service\Request;

class CreateApprovedLegalAddress extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/invoice/payments/%s/approvedlegaladdress');
    }
}
