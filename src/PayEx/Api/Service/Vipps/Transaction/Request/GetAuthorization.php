<?php

namespace PayEx\Api\Service\Vipps\Transaction\Request;

use PayEx\Api\Service\Request;

class GetAuthorization extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/vippsv1/payments/%s/authorizations/%s');
    }
}
