<?php

namespace PayEx\Api\Service\Swish\Resource;

use PayEx\Api\Service\Swish\Resource\Data\PaymentSwishInterface;
use PayEx\Api\Service\Resource;

/**
 * Swish payment swish data object
 */
class PaymentSwish extends Resource implements PaymentSwishInterface
{

    /**
     * @return bool
     */
    public function isEcomOnlyEnabled()
    {
        return $this->offsetGet(self::ECOM_ONLY_ENABLED);
    }

    /**
     * @param bool $ecomOnlyEnabled
     * @return $this
     */
    public function setEcomOnlyEnabled($ecomOnlyEnabled)
    {
        return $this->offsetSet(self::ECOM_ONLY_ENABLED, $ecomOnlyEnabled);
    }
}
