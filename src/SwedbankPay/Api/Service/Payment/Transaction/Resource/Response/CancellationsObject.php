<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\CancellationsInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\CancellationsObjectInterface;

class CancellationsObject extends TransactionResponse implements CancellationsObjectInterface
{
    /**
     * @return CancellationsInterface
     */
    public function getCancellations()
    {
        return $this->offsetGet(self::CANCELLATIONS);
    }

    /**
     * @param CancellationsInterface $cancellations
     * @return $this
     */
    public function setCancellations($cancellations)
    {
        $this->offsetSet(self::CANCELLATIONS, $cancellations);
        return $this;
    }
}
