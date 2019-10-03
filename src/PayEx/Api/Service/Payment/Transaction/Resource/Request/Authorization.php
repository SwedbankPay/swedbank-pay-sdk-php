<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Data\AuthorizationInterface;
use PayEx\Api\Service\Resource\Request as RequestResource;

/**
 * Authorization data object
 */
class Authorization extends RequestResource implements AuthorizationInterface
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
