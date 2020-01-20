<?php

namespace PayEx\Api\Service\Swish\Transaction\Resource\Response\Collection\Item\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\Data\TransactionListItemInterface;

interface SaleListItemInterface extends TransactionListItemInterface
{
    const DATE = 'date';
    const PAYER_ALIAS = 'payer_alias';
    const SWISH_PAYMENT_REFERENCE = 'swish_payment_reference';
    const SWISH_STATUS = 'swish_status';

    /**
    * @return string
    */
    public function getDate();

    /**
    * @param string $date
    * @return $this
    */
    public function setDate($date);

    /**
    * @return string
    */
    public function getPayerAlias();

    /**
    * @param string $payerAlias
    * @return $this
    */
    public function setPayerAlias($payerAlias);

    /**
    * @return string
    */
    public function getSwishPaymentReference();

    /**
     * @param string $swishPaymentRef
     * @return $this
     */
    public function setSwishPaymentReference($swishPaymentRef);

    /**
    * @return string
    */
    public function getSwishStatus();

    /**
    * @param string $swishStatus
    * @return $this
    */
    public function setSwishStatus($swishStatus);
}
