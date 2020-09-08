<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalObject;
use SwedbankPay\Api\Service\Request;

class GetReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setResponseResourceFQCN(ReversalObject::class);
    }
}
