<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\OrderItemsInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `orderItems` sub-resource of a paymentOrder.
 */
class OrderItems extends ResponseResource implements OrderItemsInterface
{
    use LinkResourceTrait;
}
