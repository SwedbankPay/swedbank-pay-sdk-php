<?php

namespace SwedbankPay\Api\Service\Swish\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

interface SaleInterface extends TransactionResourceInterface
{
    const DATE = 'date';
    const PAYMENT_REQUEST_TOKEN = 'payment_request_token';

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
    public function getPaymentRequestToken();
    
    /**
    * @param string $paymentRequestToken
    * @return $this
    */
    public function setPaymentRequestToken($paymentRequestToken);
}
