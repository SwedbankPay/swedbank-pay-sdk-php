<?php

namespace SwedbankPay\Api\Service\Swish\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\SaleObjectInterface;
use SwedbankPay\Api\Service\Request;

class CreateSale extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/swish/payments/%s/sales');
        $this->setResponseResourceFQCN(SaleObjectInterface::class);
    }
}
