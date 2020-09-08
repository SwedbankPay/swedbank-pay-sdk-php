<?php

namespace SwedbankPay\Api\Service\Vipps\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\AuthorizationObject;
use SwedbankPay\Api\Service\Request;

class GetAuthorization extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setResponseResourceFQCN(AuthorizationObject::class);
    }
}
