<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\ReversalObject;
use PayEx\Api\Service\Request;

class GetReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/creditcard/payments/%s/reversals/%s');
        $this->setResponseResourceFQCN(ReversalObject::class);
    }
}
