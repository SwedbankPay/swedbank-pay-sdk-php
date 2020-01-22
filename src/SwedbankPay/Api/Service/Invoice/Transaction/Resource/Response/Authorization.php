<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Response\Data\AuthorizationInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ConsumerDataTrait;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Authorization extends TransactionResource implements AuthorizationInterface
{
    use ConsumerDataTrait;
}
