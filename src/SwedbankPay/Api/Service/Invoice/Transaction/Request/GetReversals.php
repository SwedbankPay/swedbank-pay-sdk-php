<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalsObject;
use SwedbankPay\Api\Service\Request;

class GetReversals extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setOperationRel('reversals');
        $this->setResponseResourceFQCN(ReversalsObject::class);
    }
}
