<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\ReversalsInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\ReversalsObjectInterface;

class ReversalsObject extends TransactionResponse implements ReversalsObjectInterface
{
    /**
     * @return ReversalsInterface
     */
    public function getReversals()
    {
        return $this->offsetGet(self::REVERSALS);
    }

    /**
     * @param ReversalsInterface $reversals
     * @return $this
     */
    public function setReversals($reversals)
    {
        $this->offsetSet(self::REVERSALS, $reversals);
        return $this;
    }
}
