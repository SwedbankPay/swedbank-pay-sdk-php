<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Request;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;
use SwedbankPay\Api\Service\Request;

/**
 * Update the order amount/items on an existing paymentOrder via v3.1.
 */
class UpdateOrder extends Request
{
    public function setup()
    {
        $this->setOperationRel('update-paymentorder-updateorder');
        $this->setServiceOperation('UpdateOrder');
        $this->setResponseResourceFQCN(PaymentorderResponse::class);
    }
}
