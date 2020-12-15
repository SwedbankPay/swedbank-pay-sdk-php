<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Request;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionCancel as TransactionCancelResponse;
use SwedbankPay\Api\Service\Request;

class TransactionCancel extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-paymentorder-cancel');
        $this->setResponseResourceFQCN(TransactionCancelResponse::class);
    }
}
