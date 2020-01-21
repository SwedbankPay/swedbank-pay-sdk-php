<?php

namespace PayEx\Api\Service\Invoice\Transaction\Resource\Request;

use PayEx\Api\Service\Invoice\Transaction\Resource\Request\Data\TransactionInterface;
use PayEx\Api\Service\Resource\Request as RequestResource;

/**
 * Transaction authorization data object
 */
class Transaction extends RequestResource implements TransactionInterface
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
