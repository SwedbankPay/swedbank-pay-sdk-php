<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\AuthorizationObjectInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

class AuthorizationObject extends TransactionResponse implements AuthorizationObjectInterface
{
    /**
     * @return TransactionResourceInterface
     */
    public function getAuthorization()
    {
        return $this->offsetGet(self::AUTHORIZATION);
    }

    /**
     * @param TransactionResourceInterface $authorization
     * @return $this
     */
    public function setAuthorization($authorization)
    {
        $this->offsetSet(self::AUTHORIZATION, $authorization);
        return $this;
    }
}
