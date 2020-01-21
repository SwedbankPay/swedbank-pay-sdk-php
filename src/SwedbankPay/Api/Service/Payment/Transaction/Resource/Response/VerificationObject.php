<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\VerificationObjectInterface;

class VerificationObject extends TransactionResponse implements VerificationObjectInterface
{
    /**
     * @return TransactionResourceInterface
     */
    public function getVerification()
    {
        return $this->offsetGet(self::VERIFICATION);
    }

    /**
     * @param TransactionResourceInterface $verification
     * @return $this
     */
    public function setVerification($verification)
    {
        $this->offsetSet(self::VERIFICATION, $verification);
        return $this;
    }
}
