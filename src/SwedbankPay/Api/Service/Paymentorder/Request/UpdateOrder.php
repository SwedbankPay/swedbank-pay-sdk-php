<?php

namespace SwedbankPay\Api\Service\Paymentorder\Request;

use SwedbankPay\Api\Service\Request;

class UpdateOrder extends Request
{
    public function setup()
    {
        $this->setOperationRel('update-paymentorder-updateorder');
        $this->setServiceOperation('UpdateOrder');
    }
}
