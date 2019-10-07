<?php

namespace PayEx\Api\Service\Creditcard\Transaction\Resource\Request;

use PayEx\Api\Service\Payment\Transaction\Resource\Request\Transfer;
use PayEx\Api\Service\Creditcard\Transaction\Resource\Request\Data\TransactionFinalizeInterface;

/**
 * Transaction finalize data object
 */
class TransactionFinalize extends Transfer implements TransactionFinalizeInterface
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
