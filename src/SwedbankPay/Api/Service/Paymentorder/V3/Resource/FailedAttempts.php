<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\FailedAttemptsInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `failedAttempts` sub-resource of a paymentOrder.
 */
class FailedAttempts extends ResponseResource implements FailedAttemptsInterface
{
    use LinkResourceTrait;
}
