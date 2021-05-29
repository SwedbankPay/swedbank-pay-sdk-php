<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderMetadataInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payment order metadata data object
 */
class PaymentorderMetadata extends Resource implements PaymentorderMetadataInterface
{
    /**
     * Get Data.
     *
     * @param string $key
     * @return mixed
     */
    public function getData($key)
    {
        return $this->offsetGet($key);
    }

    /**
     * Set Data.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setData($key, $value)
    {
        return $this->offsetSet($key, $value);
    }

    /**
     * Unset Data.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function unsetData($key)
    {
        return $this->offsetUnset($key);
    }
}
