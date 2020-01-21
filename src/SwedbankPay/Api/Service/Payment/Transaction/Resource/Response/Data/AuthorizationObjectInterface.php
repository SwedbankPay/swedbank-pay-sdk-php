<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Data;

interface AuthorizationObjectInterface extends TransactionResponseInterface
{
    const AUTHORIZATION = 'authorization';

    /**
     * @return TransactionResourceInterface
     */
    public function getAuthorization();

    /**
     * @param TransactionResourceInterface $authorization
     * @return $this
     */
    public function setAuthorization($authorization);
}
