<?php

namespace PayEx\Api\Service\Payment\Resource\Request;

use PayEx\Api\Service\Payment\Resource\Request\Data\PrefillInfoInterface;
use PayEx\Api\Service\Resource;

/**
 * Prefill info data object
 */
class PrefillInfo extends Resource implements PrefillInfoInterface
{
    /**
     * @return string
     */
    public function getMsisdn()
    {
        return $this->offsetGet(self::MSISDN);
    }

    /**
     * @param string $msisdn
     * @return $this
     */
    public function setMsisdn($msisdn)
    {
        return $this->offsetSet(self::MSISDN, $msisdn);
    }
}
