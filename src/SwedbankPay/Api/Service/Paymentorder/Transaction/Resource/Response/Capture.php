<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Resource;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\CaptureInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\TransactionInterface;

class Capture extends Resource implements CaptureInterface
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $captureId
     * @return $this
     */
    public function setId($captureId)
    {
        return $this->offsetSet(self::ID, $captureId);
    }

    /**
     * @return TransactionInterface
     */
    public function getTransaction()
    {
        return $this->offsetGet(self::TRANSACTION);
    }

    /**
     * @param TransactionInterface $transaction
     * @return $this
     */
    public function setTransaction($transaction)
    {
        return $this->offsetSet(self::TRANSACTION, $transaction);
    }
}
