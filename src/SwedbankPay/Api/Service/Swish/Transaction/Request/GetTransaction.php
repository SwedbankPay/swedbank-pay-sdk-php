<?php

namespace SwedbankPay\Api\Service\Swish\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionObject;
use SwedbankPay\Api\Service\Request;

class GetTransaction extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/swish/payments/%s/transactions/%s');
        $this->setResponseResourceFQCN(TransactionObject::class);
    }
}
