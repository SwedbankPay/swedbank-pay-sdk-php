<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PayerInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `payer` sub-resource of a paymentOrder.
 */
class Payer extends ResponseResource implements PayerInterface
{
    use LinkResourceTrait;
}
