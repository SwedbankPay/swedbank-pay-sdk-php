<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\FinalizeObject;
use SwedbankPay\Api\Service\Request;

class Finalize extends Request
{
    public function setup()
    {
        $this->setRequestMethod('PATCH');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/authorizations/%s');
        $this->setResponseResourceFQCN(FinalizeObject::class);
    }
}
