<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

trait ConsumerDataTrait
{
    /**
     * @return TransactionResourceInterface
     */
    public function getConsumer()
    {
        return $this->offsetGet(self::CONSUMER);
    }

    /**
     * @param TransactionResourceInterface $consumer
     * @return $this
     */
    public function setConsumer($consumer)
    {
        $this->offsetSet(self::CONSUMER, $consumer);
        return $this;
    }

    /**
     * @return TransactionResourceInterface
     */
    public function getLegalAddress()
    {
        return $this->offsetGet(self::LEGAL_ADDRESS);
    }

    /**
     * @param TransactionResourceInterface $legalAddress
     * @return $this
     */
    public function setLegalAddress($legalAddress)
    {
        $this->offsetSet(self::LEGAL_ADDRESS, $legalAddress);
        return $this;
    }

    /**
     * @return TransactionResourceInterface
     */
    public function getBillingAddress()
    {
        return $this->offsetGet(self::BILLING_ADDRESS);
    }

    /**
     * @param TransactionResourceInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress($billingAddress)
    {
        $this->offsetSet(self::BILLING_ADDRESS, $billingAddress);
        return $this;
    }
}
