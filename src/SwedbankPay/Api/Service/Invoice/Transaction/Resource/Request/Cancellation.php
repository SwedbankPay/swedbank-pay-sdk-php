<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Cancellation as CancellationTransaction;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\CancellationInterface;

/**
 * Transaction cancellation data object
 */
class Cancellation extends CancellationTransaction implements CancellationInterface
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
