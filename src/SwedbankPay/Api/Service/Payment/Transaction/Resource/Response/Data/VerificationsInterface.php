<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface VerificationsInterface extends TransactionResourceInterface
{
    const VERIFICATION_LIST = 'verification_list';

    /**
    * @return string
    */
    public function getVerificationList();
    
    /**
    * @param string $verificationList
    * @return $this
    */
    public function setVerificationList($verificationList);
}
