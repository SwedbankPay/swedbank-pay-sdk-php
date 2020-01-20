<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\VerificationObject;
use SwedbankPay\Api\Service\Request;

class CreateVerification extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/verifications');
        $this->setResponseResourceFQCN(VerificationObject::class);
    }
}
