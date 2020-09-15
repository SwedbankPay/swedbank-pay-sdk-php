<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Request;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\MetadataInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payment metadata data object
 */
class Metadata extends Resource implements MetadataInterface
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
