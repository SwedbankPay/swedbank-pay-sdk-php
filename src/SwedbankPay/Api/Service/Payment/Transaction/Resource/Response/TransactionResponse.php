<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResponseInterface;
use SwedbankPay\Api\Service\Resource\ResponseTrait;

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
