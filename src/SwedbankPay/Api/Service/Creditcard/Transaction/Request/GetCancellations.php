<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CancellationsObject;
use SwedbankPay\Api\Service\Request;

class GetCancellations extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setOperationRel('cancellations');
        $this->setResponseResourceFQCN(CancellationsObject::class);
    }
}
