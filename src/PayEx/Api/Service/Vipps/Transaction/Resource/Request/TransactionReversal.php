<?php

namespace PayEx\Api\Service\Vipps\Transaction\Resource\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use PayEx\Api\Service\Vipps\Transaction\Resource\Request\Data\TransactionReversalInterface;

/**
 * Transaction reversal data object
 */
class TransactionReversal extends Transfer implements TransactionReversalInterface
{

}
