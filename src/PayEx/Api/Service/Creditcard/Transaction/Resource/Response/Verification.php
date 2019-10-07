<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Resource\Response;

use PayEx\Api\Service\Creditcard\Transaction\Resource\Response\Data\VerificationInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Verification extends TransactionResource implements VerificationInterface
{
    use AuthorizationTrait;
}
