<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\ReversalsObject;
use PayEx\Api\Service\Request;

class GetReversals extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/reversals');
        $this->setResponseResourceFQCN(ReversalsObject::class);
    }
}
