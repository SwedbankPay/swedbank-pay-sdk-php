<?php

namespace SwedbankPay\Api\Service\Vipps\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

interface AuthorizationInterface extends TransactionResourceInterface
{
    const CONSUMER = 'consumer';
    const LEGAL_ADDRESS = 'legal_address';
    const BILLING_ADDRESS = 'billing_address';

    /**
    * @return string
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
    public function getLegalAddress();
    
    /**
    * @param TransactionResourceInterface $legalAddress
    * @return $this
    */
    public function setLegalAddress($legalAddress);

    /**
    * @return TransactionResourceInterface
    */
    public function getBillingAddress();
    
    /**
    * @param TransactionResourceInterface $billingAddress
    * @return $this
    */
    public function setBillingAddress($billingAddress);
}
