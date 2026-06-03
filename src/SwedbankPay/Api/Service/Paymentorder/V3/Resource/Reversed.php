<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\ReversedInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `reversed` sub-resource of a paymentOrder.
 */
class Reversed extends ResponseResource implements ReversedInterface
{
    use LinkResourceTrait;
}
