<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data;

use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Base interface for v3.1 sub-resources that are returned as `{ "id": "..." }` link stubs
 * unless explicitly expanded via `?$expand=...`.
 *
 * @api
 */
interface LinkResourceInterface extends ResponseInterface
{
    const ID = 'id';

    /**
     * @return string|null
     */
    public function getId();

    /**
     * @param string $resourceId
     * @return $this
     */
    public function setId($resourceId);
}
