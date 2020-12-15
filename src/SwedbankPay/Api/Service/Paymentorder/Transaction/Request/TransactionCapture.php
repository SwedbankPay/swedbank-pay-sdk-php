<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Request;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionCapture as TransactionCaptureResponse;
use SwedbankPay\Api\Service\Request;

class TransactionCapture extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-paymentorder-capture');
        $this->setResponseResourceFQCN(TransactionCaptureResponse::class);
    }
}
