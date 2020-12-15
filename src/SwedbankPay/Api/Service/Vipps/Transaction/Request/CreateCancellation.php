<?php

namespace SwedbankPay\Api\Service\Vipps\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CancellationObject;
use SwedbankPay\Api\Service\Request;

class CreateCancellation extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-cancellation');
        $this->setResponseResourceFQCN(CancellationObject::class);
    }
}
