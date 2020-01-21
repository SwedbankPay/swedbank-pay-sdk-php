<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\AuthorizationObject;
use PayEx\Api\Service\Request;

class GetAuthorization extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/authorizations/%s');
        $this->setResponseResourceFQCN(AuthorizationObject::class);
    }
}
