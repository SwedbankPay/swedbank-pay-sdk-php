<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\CancellationInterface;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

/**
 * Cancellation data object
 */
class Cancellation extends RequestResource implements CancellationInterface
{
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->offsetGet(self::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->offsetSet(self::DESCRIPTION, $description);
    }

    /**
     * @return string
     */
    public function getPayeeReference()
    {
        return $this->offsetGet(self::PAYEE_REFERENCE);
    }

    /**
     * @param $payeeReference
     * @return $this
     */
    public function setPayeeReference($payeeReference)
    {
        return $this->offsetSet(self::PAYEE_REFERENCE, $payeeReference);
    }
}
