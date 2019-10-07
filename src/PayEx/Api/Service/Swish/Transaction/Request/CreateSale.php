<?php

namespace PayEx\Api\Service\Swish\Transaction\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\SaleObjectInterface;
use PayEx\Api\Service\Request;

class CreateSale extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/swish/payments/%s/sales');
        $this->setResponseResourceFQCN(SaleObjectInterface::class);
    }
}
