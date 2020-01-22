<?php

namespace SwedbankPay\Api\Service\Vipps\Transaction\Resource\Response\Collection\Item\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\Data\TransactionListItemInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

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
