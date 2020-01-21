<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface TransactionResourceInterface
{
    const ID = 'ID';

    /**
    * @return string
    */
    public function getId();
    
    /**
    * @param string $resourceId
    * @return $this
    */
    public function setId($resourceId);
}
