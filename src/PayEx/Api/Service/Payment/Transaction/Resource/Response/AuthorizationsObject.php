<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\AuthorizationsInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\AuthorizationsObjectInterface;

class AuthorizationsObject extends TransactionResponse implements AuthorizationsObjectInterface
{
    /**
     * @return AuthorizationsInterface
     */
    public function getAuthorizations()
    {
        return $this->offsetGet(self::AUTHORIZATIONS);
    }

    /**
     * @param AuthorizationsInterface $authorizations
     * @return $this
     */
    public function setAuthorizations($authorizations)
    {
        $this->offsetSet(self::AUTHORIZATIONS, $authorizations);
        return $this;
    }
}
