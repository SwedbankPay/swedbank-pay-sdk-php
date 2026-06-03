<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\LinkResourceInterface;

/**
 * Provides the shared `id` getter/setter for v3.1 sub-resources that are returned as
 * `{ "id": "..." }` link stubs unless expanded.
 */
trait LinkResourceTrait
{
    /**
     * @return string|null
     */
    public function getId()
    {
        return $this->offsetGet(LinkResourceInterface::ID);
    }

    /**
     * @param string $resourceId
     * @return $this
     */
    public function setId($resourceId)
    {
        return $this->offsetSet(LinkResourceInterface::ID, $resourceId);
    }
}
