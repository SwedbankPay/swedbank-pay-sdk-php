<?php

namespace SwedbankPay\Api\Service\Swish\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Swish\Transaction\Resource\Response\Data\SaleInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class Sale extends TransactionResource implements SaleInterface
{
    /**
     * @return string
     */
    public function getDate()
    {
        return $this->offsetGet(self::DATE);
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->offsetSet(self::DATE, $date);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPaymentRequestToken()
    {
        return $this->offsetGet(self::PAYMENT_REQUEST_TOKEN);
    }

    /**
     * @param string $paymentRequestToken
     * @return $this
     */
    public function setPaymentRequestToken($paymentRequestToken)
    {
        $this->offsetSet(self::PAYMENT_REQUEST_TOKEN, $paymentRequestToken);
        return $this;
    }
}
