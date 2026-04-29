<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\HistoryInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `history` sub-resource of a paymentOrder.
 */
class History extends ResponseResource implements HistoryInterface
{
    use LinkResourceTrait;
}
