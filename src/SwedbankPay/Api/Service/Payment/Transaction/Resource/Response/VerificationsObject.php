<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\VerificationsObjectInterface;

class VerificationsObject extends TransactionResponse implements VerificationsObjectInterface
{
    /**
     * @return string
     */
    public function getVerifications()
    {
        return $this->offsetGet(self::VERIFICATIONS);
    }

    /**
     * @param string $verifications
     * @return $this
     */
    public function setVerifications($verifications)
    {
        $this->offsetSet(self::VERIFICATIONS, $verifications);
        return $this;
    }
}
