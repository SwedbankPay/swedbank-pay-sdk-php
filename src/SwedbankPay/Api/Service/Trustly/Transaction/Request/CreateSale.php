<?php

namespace SwedbankPay\Api\Service\Trustly\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\SaleObject;
use SwedbankPay\Api\Service\Request;

class CreateSale extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-sale');
        $this->setResponseResourceFQCN(SaleObject::class);
    }
}
