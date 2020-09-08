<?php

namespace SwedbankPay\Api\Service\Paymentorder\Request;

use SwedbankPay\Api\Service\Request;

class GetCurrentPayment extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setOperationRel('current_payment');
    }
}
