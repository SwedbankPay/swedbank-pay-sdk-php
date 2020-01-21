<?php

namespace SwedbankPay\Api\Service\Swish\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

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
