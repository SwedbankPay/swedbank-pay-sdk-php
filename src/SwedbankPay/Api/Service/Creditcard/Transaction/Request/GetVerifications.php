<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\VerificationsObject;
use PayEx\Api\Service\Request;

class GetVerifications extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/verifications');
        $this->setResponseResourceFQCN(VerificationsObject::class);
    }
}
