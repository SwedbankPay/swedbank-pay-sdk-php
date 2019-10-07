<?php

namespace PayEx\Api\Service\Swish\Transaction\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\ReversalObject;
use PayEx\Api\Service\Request;

class CreateReversal extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/swish/payments/%s/reversals');
        $this->setResponseResourceFQCN(ReversalObject::class);
    }
}
