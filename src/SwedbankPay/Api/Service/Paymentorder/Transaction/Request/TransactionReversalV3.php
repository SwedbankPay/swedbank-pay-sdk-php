<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Request;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionReversal as TransactionRevResponse;
use SwedbankPay\Api\Service\Request;

/**
 * TransactionReversalV3 for Checkout v3
 */
class TransactionReversalV3 extends Request
{
    public function setup()
    {
        $this->setOperationRel('reversal');
        $this->setResponseResourceFQCN(TransactionRevResponse::class);
    }
}
