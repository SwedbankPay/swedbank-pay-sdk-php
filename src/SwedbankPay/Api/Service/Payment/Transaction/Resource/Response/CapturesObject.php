<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\CapturesInterface;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\CapturesObjectInterface;

class CapturesObject extends TransactionResponse implements CapturesObjectInterface
{
    /**
     * @return CapturesInterface
     */
    public function getCaptures()
    {
        return $this->offsetGet(self::CAPTURES);
    }

    /**
     * @param CapturesInterface $captures
     * @return $this
     */
    public function setCaptures($captures)
    {
        $this->offsetSet(self::CAPTURES, $captures);
        return $this;
    }
}
