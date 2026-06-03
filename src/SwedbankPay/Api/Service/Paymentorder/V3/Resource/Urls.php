<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\UrlsInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `urls` sub-resource of a paymentOrder.
 */
class Urls extends ResponseResource implements UrlsInterface
{
    use LinkResourceTrait;
}
