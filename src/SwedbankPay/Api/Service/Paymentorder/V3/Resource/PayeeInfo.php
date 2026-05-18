<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PayeeInfoInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `payeeInfo` sub-resource of a paymentOrder.
 */
class PayeeInfo extends ResponseResource implements PayeeInfoInterface
{
    use LinkResourceTrait;
}
