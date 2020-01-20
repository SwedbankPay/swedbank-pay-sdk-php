<?php

namespace PayEx\Api\Service\Vipps\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\ConsumerDataTrait;
use PayEx\Api\Service\Vipps\Transaction\Resource\Response\Data\AuthorizationInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Authorization extends TransactionResource implements AuthorizationInterface
{
    use ConsumerDataTrait;
}
