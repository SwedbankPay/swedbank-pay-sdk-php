<?php

namespace PayEx\Api\Service\Transaction\Resource\Response;

use PayEx\Api\Service\Resource\Response as ResponseResource;
use PayEx\Api\Service\Transaction\Resource\Response\Data\TransactionCaptureInterface;
use PayEx\Api\Service\Transaction\Resource\Response\Data\CaptureInterface;

/**
 * Transaction data object
 */
class TransactionCapture extends ResponseResource implements TransactionCaptureInterface
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
     * @return CaptureInterface
     */
    public function getCapture()
    {
        return $this->offsetGet(self::CAPTURE);
    }

    /**
     * @param CaptureInterface $capture
     * @return $this
     */
    public function setCapture($capture)
    {
        return $this->offsetSet(self::CAPTURE, $capture);
    }
}
