<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\AuthorizationInterface;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

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
