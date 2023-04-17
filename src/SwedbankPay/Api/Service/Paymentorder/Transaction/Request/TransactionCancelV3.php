<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Request;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionCancel as TransactionCancelResponse;
use SwedbankPay\Api\Service\Request;

/**
 * TransactionCancel for Checkout v3
 */
class TransactionCancelV3 extends Request
{
    public function setup()
    {
        $this->setOperationRel('cancel');
        $this->setResponseResourceFQCN(TransactionCancelResponse::class);
    }
}
