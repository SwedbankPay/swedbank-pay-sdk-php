<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Response;

use SwedbankPay\Api\Service\Resource\Response as ResponseResource;
use SwedbankPay\Api\Service\Consumer\Resource\Response\Data\InitiateConsumerSessionInterface;

/**
 * Initiate Consumer Session response resource object
 */
class InitiateConsumerSession extends ResponseResource implements InitiateConsumerSessionInterface
{
    /**
     * @return string
     */
    public function getToken()
    {
        return $this->offsetGet(self::TOKEN);
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        return $this->offsetSet(self::TOKEN, $token);
    }
}
