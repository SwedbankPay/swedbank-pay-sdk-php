<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Request;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionCapture as TransactionCaptureResponse;
use SwedbankPay\Api\Service\Request;

/**
 * TransactionCaptureV3 for Checkout v3
 */
class TransactionCaptureV3 extends Request
{
    public function setup()
    {
        $this->setOperationRel('capture');
        $this->setResponseResourceFQCN(TransactionCaptureResponse::class);
    }
}
