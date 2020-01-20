<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Resource\Data\ResponseInterface;

interface TransactionResponseInterface extends TransactionResourceInterface, ResponseInterface
{
    const PAYMENT = 'payment';

    /**
    * @return string
    */
    public function getPayment();

    /**
    * @param string $payment
    * @return $this
    */
    public function setPayment($payment);
}
