<?php

namespace PayEx\Api\Service\Invoice\Transaction\Request;

use PayEx\Api\Service\Request;

class GetAuthorizations extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/invoice/payments/%s/authorizations');
    }
}
