<?php

namespace SwedbankPay\Api\Service\Swish\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\SaleObject;
use SwedbankPay\Api\Service\Request;

class GetSale extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setResponseResourceFQCN(SaleObject::class);
    }
}
