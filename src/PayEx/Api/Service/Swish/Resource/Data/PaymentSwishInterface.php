<?php

namespace PayEx\Api\Service\Swish\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;

/**
 * Swish payment swish interface
 *
 * @api
 */
interface PaymentSwishInterface extends ResourceInterface
{
    const ECOM_ONLY_ENABLED = 'ecom_only_enabled';

    /**
     * @return bool
     */
    public function isEcomOnlyEnabled();

    /**
     * @param bool $ecomOnlyEnabled
     * @return $this
     */
    public function setEcomOnlyEnabled($ecomOnlyEnabled);
}
