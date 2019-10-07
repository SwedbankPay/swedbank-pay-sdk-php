<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Resource\Response;

use PayEx\Api\Service\Creditcard\Transaction\Resource\Response\Data\FinalizeInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Finalize extends TransactionResource implements FinalizeInterface
{
    use AuthorizationTrait;
}
