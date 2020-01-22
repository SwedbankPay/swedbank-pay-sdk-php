<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\Data\TransactionReversalInterface;

/**
 * Transaction reversal data object
 */
class TransactionReversal extends Transfer implements TransactionReversalInterface
{

}
