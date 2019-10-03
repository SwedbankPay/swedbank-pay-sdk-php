<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\ProblemInterface;
use PayEx\Api\Service\Payment\Transaction\Response\Data\TransactionInterface;

class Transaction extends TransactionResource implements TransactionInterface
{
    use TransactionTrait;
}
