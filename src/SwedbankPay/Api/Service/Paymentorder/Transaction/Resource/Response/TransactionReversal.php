<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Resource\Response as ResponseResource;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\TransactionReversalInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\ReversalInterface;

/**
 * Transaction data object
 */
class TransactionReversal extends ResponseResource implements TransactionReversalInterface
{
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
        return $this->offsetSet(self::PAYMENT, $payment);
    }

    /**
     * @return ReversalInterface
     */
    public function getReversal()
    {
        return $this->offsetGet(self::REVERSAL);
    }

    /**
     * @param ReversalInterface $reversal
     * @return $this
     */
    public function setReversal($reversal)
    {
        return $this->offsetSet(self::REVERSAL, $reversal);
    }
}
