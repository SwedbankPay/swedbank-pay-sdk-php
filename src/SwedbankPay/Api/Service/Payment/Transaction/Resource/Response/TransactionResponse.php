<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResponseInterface;
use PayEx\Api\Service\Resource\ResponseTrait;

class TransactionResponse extends TransactionResource implements TransactionResponseInterface
{
    use ResponseTrait;

    /**
     * @return string
     */
    public function getPayment()
    {
        return $this->offsetGet(self::PAYMENT);
    }

    /**
     * @param string $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        $this->offsetSet(self::PAYMENT, $payment);
        return $this;
    }
}
