<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data\TransactionListItemInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

interface AuthorizationListItemInterface extends TransactionListItemInterface
{
    const CONSUMER = 'consumer';
    const BILLING_ADDRESS = 'billing_address';
    const LEGAL_ADDRESS = 'legal_address';

    /**
    * @return TransactionResourceInterface
    */
    public function getConsumer();
    
    /**
    * @param TransactionResourceInterface $consumer
    * @return $this
    */
    public function setConsumer($consumer);
    
    /**
    * @return TransactionResourceInterface
    */
    public function getBillingAddress();
    
    /**
    * @param TransactionResourceInterface $billingAddress
    * @return $this
    */
    public function setBillingAddress($billingAddress);
    
    /**
    * @return TransactionResourceInterface
    */
    public function getLegalAddress();
    
    /**
    * @param TransactionResourceInterface $legalAddress
    * @return $this
    */
    public function setLegalAddress($legalAddress);
}
