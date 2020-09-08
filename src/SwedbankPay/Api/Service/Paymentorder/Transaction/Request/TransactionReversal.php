<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Request;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionReversal as TransactionRevResponse;
use SwedbankPay\Api\Service\Request;

class TransactionReversal extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-paymentorder-reversal');
        $this->setResponseResourceFQCN(TransactionRevResponse::class);
    }
}
