<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\AuthorizationsObject;
use SwedbankPay\Api\Service\Request;

class GetAuthorizations extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setOperationRel('authorizations');
        $this->setResponseResourceFQCN(AuthorizationsObject::class);
    }
}
