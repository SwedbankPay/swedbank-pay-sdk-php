<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\AbortedInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `aborted` sub-resource of a paymentOrder.
 */
class Aborted extends ResponseResource implements AbortedInterface
{
    use LinkResourceTrait;
}
