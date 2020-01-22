<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Data\AuthorizationInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Authorization extends TransactionResource implements AuthorizationInterface
{
    use AuthorizationTrait;
}
