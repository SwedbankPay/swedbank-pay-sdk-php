<?php

namespace PayEx\Api\Service\Transaction\Resource\Response;

use PayEx\Api\Service\Resource\Response as ResponseResource;
use PayEx\Api\Service\Transaction\Resource\Response\Data\TransactionCancelInterface;
use PayEx\Api\Service\Transaction\Resource\Response\Data\CancellationInterface;

/**
 * Transaction data object
 */
class TransactionCancel extends ResponseResource implements TransactionCancelInterface
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
     * @return CancellationInterface
     */
    public function getCancellation()
    {
        return $this->offsetGet(self::CANCELLATION);
    }

    /**
     * @param CancellationInterface $cancellation
     * @return $this
     */
    public function setCancellation($cancellation)
    {
        return $this->offsetSet(self::CANCELLATION, $cancellation);
    }
}
