<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

interface VerificationObjectInterface extends ResponseInterface
{
    const VERIFICATION = 'verification';

    /**
    * @return TransactionResourceInterface
    */
    public function getVerification();
    
    /**
    * @param TransactionResourceInterface $verification
    * @return $this
    */
    public function setVerification($verification);
}
