<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface AuthorizationsObjectInterface extends TransactionsResponseInterface
{
    const AUTHORIZATIONS = 'authorizations';

    /**
    * @return AuthorizationsInterface
    */
    public function getAuthorizations();
    
    /**
    * @param AuthorizationsInterface $authorizations
    * @return $this
    */
    public function setAuthorizations($authorizations);
}
