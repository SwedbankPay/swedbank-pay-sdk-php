<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Resource\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Cancellation;
use PayEx\Api\Service\Creditcard\Transaction\Resource\Request\Data\TransactionCancellationInterface;

/**
 * Transaction cancellation data object
 */
class TransactionCancellation extends Cancellation implements TransactionCancellationInterface
{

}
