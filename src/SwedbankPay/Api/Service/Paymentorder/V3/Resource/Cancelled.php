<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\CancelledInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `cancelled` sub-resource of a paymentOrder.
 */
class Cancelled extends ResponseResource implements CancelledInterface
{
    use LinkResourceTrait;
}
