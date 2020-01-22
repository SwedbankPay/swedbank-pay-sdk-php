<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Data\VerificationInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Verification extends TransactionResource implements VerificationInterface
{
    use AuthorizationTrait;
}
