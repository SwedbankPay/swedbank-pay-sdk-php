<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\VerificationObject;
use SwedbankPay\Api\Service\Request;

class GetVerification extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/verifications/%s');
        $this->setResponseResourceFQCN(VerificationObject::class);
    }
}
