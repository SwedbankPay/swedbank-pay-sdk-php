<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\VerificationsObject;
use SwedbankPay\Api\Service\Request;

class GetVerifications extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setOperationRel('verifications');
        $this->setResponseResourceFQCN(VerificationsObject::class);
    }
}
