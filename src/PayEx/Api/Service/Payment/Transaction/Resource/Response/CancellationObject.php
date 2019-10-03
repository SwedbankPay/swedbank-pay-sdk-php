<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\CancellationObjectInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

class CancellationObject extends TransactionResponse implements CancellationObjectInterface
{
    /**
     * @return TransactionResourceInterface
     */
    public function getCancellation()
    {
        return $this->offsetGet(self::CANCELLATION);
    }

    /**
     * @param TransactionResourceInterface $cancellation
     * @return $this
     */
    public function setCancellation($cancellation)
    {
        $this->offsetSet(self::CANCELLATION, $cancellation);
        return $this;
    }
}
