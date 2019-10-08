<?php

namespace PayEx\Api\Service\Invoice\Transaction\Resource\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use PayEx\Api\Service\Invoice\Transaction\Resource\Request\Data\ReversalInterface;

/**
 * Transaction reversal data object
 */
class Reversal extends Transfer implements ReversalInterface
{
    /**
     * @return string
     */
    public function getActivity()
    {
        return $this->offsetGet(self::ACTIVITY);
    }

    /**
     * @param string $activity
     * @return $this
     */
    public function setActivity($activity)
    {
        return $this->offsetSet(self::ACTIVITY, $activity);
    }
}
