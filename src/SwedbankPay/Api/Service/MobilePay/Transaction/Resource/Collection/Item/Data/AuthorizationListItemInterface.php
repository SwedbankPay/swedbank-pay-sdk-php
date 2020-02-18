<?php

namespace SwedbankPay\Api\Service\MobilePay\Transaction\Resource\Collection\Item\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data\TransactionListItemInterface;

interface AuthorizationListItemInterface extends TransactionListItemInterface
{
    const MOBILEPAY_TRANSACTION_ID = 'mobilepay_transaction_id';
    const MSISDN = 'msisdn';

    /**
    * @return string
    */
    public function getMobilePayTransactionId();
    
    /**
    * @param string $mobilePayTransactionId
    * @return $this
    */
    public function setMobilePayTransactionId($mobilePayTransactionId);
    
    /**
    * @return string
    */
    public function getMsisdn();
    
    /**
    * @param string $msisdn
    * @return $this
    */
    public function setMsisdn($msisdn);
}
