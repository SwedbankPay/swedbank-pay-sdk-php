<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\VerificationObject;
use PayEx\Api\Service\Request;

class CreateVerification extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/verifications');
        $this->setResponseResourceFQCN(VerificationObject::class);
    }
}
