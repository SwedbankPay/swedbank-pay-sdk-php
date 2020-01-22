<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Cancellation;
use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\Data\TransactionCancellationInterface;

/**
 * Transaction cancellation data object
 */
class TransactionCancellation extends Cancellation implements TransactionCancellationInterface
{

}
