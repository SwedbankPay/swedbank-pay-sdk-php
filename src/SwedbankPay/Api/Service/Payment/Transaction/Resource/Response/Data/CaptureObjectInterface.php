<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface CaptureObjectInterface extends TransactionResponseInterface
{
    const CAPTURE = 'capture';

    /**
    * @return TransactionResourceInterface
    */
    public function getCapture();
    
    /**
    * @param TransactionResourceInterface $capture
    * @return $this
    */
    public function setCapture($capture);
}
