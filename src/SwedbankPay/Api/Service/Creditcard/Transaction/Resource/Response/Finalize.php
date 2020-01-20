<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Data\FinalizeInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Finalize extends TransactionResource implements FinalizeInterface
{
    use AuthorizationTrait;
}
