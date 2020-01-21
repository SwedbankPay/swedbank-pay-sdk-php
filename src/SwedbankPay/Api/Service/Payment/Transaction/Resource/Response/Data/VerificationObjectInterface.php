<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface VerificationObjectInterface extends TransactionsResponseInterface
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
