<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface VerificationsObjectInterface extends TransactionsResponseInterface
{
    const VERIFICATIONS = 'verifications';

    /**
    * @return string
    */
    public function getVerifications();
    
    /**
    * @param string $verifications
    * @return $this
    */
    public function setVerifications($verifications);
}
