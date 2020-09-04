<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Request;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionReversal as TransactionReversalResponse;
use SwedbankPay\Api\Service\Request;

class TransactionReversal extends Request
{
    public function setup()
    {
        $this->setOperationRel('create-paymentorder-reversal');
        $this->setResponseResourceFQCN(TransactionReversalResponse::class);

        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/paymentorders/%s/reversals');
    }
}
