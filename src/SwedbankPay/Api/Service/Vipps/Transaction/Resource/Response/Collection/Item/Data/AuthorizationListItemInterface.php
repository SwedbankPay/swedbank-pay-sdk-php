<?php

namespace PayEx\Api\Service\Vipps\Transaction\Resource\Response\Collection\Item\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\Data\TransactionListItemInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

interface AuthorizationListItemInterface extends TransactionListItemInterface
{
    const VIPPS_TRANSACTION_ID = 'vipps_transaction_id';
    const MSISDN = 'msisdn';

    /**
    * @return string
    */
    public function getVippsTransactionId();

    /**
    * @param string $vippsTransactionId
    * @return $this
    */
    public function setVippsTransactionId($vippsTransactionId);

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
