<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionInterface;

class Transaction extends TransactionResource implements TransactionInterface
{
    use TransactionTrait;
}
