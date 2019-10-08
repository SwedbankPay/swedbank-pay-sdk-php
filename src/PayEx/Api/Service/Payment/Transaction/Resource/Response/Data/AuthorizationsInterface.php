<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\TransactionListCollection;

interface AuthorizationsInterface extends TransactionResourceInterface
{
    const AUTHORIZATION_LIST = 'authorization_list';

    /**
    * @return TransactionListCollection
    */
    public function getAuthorizationList();

    /**
    * @param TransactionListCollection $authorizationList
    * @return $this
    */
    public function setAuthorizationList($authorizationList);
}
