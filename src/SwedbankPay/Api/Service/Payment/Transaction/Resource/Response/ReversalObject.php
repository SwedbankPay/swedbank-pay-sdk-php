<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\ReversalObjectInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

class ReversalObject extends TransactionResponse implements ReversalObjectInterface
{
    /**
     * @return TransactionResourceInterface
     */
    public function getReversal()
    {
        return $this->offsetGet(self::REVERSAL);
    }

    /**
     * @param TransactionResourceInterface $reversal
     * @return $this
     */
    public function setReversal($reversal)
    {
        $this->offsetSet(self::REVERSAL, $reversal);
        return $this;
    }
}
