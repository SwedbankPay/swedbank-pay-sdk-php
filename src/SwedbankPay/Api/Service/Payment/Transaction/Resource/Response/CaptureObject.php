<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\CaptureObjectInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

class CaptureObject extends TransactionResponse implements CaptureObjectInterface
{
    /**
     * @return TransactionResourceInterface
     */
    public function getCapture()
    {
        return $this->offsetGet(self::CAPTURE);
    }

    /**
     * @param TransactionResourceInterface $capture
     * @return $this
     */
    public function setCapture($capture)
    {
        $this->offsetSet(self::CAPTURE, $capture);
        return $this;
    }
}
