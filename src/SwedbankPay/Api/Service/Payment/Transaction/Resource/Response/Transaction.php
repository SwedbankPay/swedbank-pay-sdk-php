<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionInterface;

class Transaction extends TransactionResource implements TransactionInterface
{
    use TransactionTrait;
}
