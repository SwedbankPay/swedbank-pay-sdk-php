<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payment order metadata interface
 *
 * @api
 */
interface MetadataInterface extends ResourceInterface
{

    /**
     * Get Data.
     *
     * @param string $key
     * @return mixed
     */
    public function getData($key);

    /**
     * Set Data.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setData($key, $value);

    /**
     * Unset Data.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function unsetData($key);
}
