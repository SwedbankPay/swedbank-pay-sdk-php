<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\AuthorizationObject;
use SwedbankPay\Api\Service\Request;

/**
 * Class CreateAuthorization
 * @deprecated Direct Invoice is about to be phased out.
 * @package SwedbankPay\Api\Service\Invoice\Transaction\Request
 */
class CreateAuthorization extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-authorization');
        $this->setResponseResourceFQCN(AuthorizationObject::class);
    }
}
