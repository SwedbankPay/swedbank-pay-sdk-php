<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\FailedInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `failed` sub-resource of a paymentOrder.
 */
class Failed extends ResponseResource implements FailedInterface
{
    use LinkResourceTrait;
}
