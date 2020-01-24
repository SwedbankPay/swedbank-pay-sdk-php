<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;

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
