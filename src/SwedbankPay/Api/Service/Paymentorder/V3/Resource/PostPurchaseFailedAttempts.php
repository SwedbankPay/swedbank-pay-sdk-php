<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PostPurchaseFailedAttemptsInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `postPurchaseFailedAttempts` sub-resource of a paymentOrder.
 */
class PostPurchaseFailedAttempts extends ResponseResource implements PostPurchaseFailedAttemptsInterface
{
    use LinkResourceTrait;
}
