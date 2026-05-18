<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\MetadataInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `metadata` sub-resource of a paymentOrder.
 */
class Metadata extends ResponseResource implements MetadataInterface
{
    use LinkResourceTrait;
}
