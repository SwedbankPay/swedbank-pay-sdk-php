<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Resource\Response;

use PayEx\Api\Service\Creditcard\Transaction\Resource\Response\Data\AuthorizationInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Authorization extends TransactionResource implements AuthorizationInterface
{
    use AuthorizationTrait;
}
