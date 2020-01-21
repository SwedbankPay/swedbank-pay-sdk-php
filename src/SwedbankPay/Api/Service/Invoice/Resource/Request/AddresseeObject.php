<?php

namespace SwedbankPay\Api\Service\Invoice\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\AddresseeObjectInterface;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\AddresseeInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Addressee object
 */
class AddresseeObject extends Resource implements AddresseeObjectInterface
{
    /**
     * @return AddresseeInterface
     */
    public function getAddressee()
    {
        return $this->offsetGet(self::ADDRESSEE);
    }

    /**
     * @param AddresseeInterface $addressee
     * @return $this
     */
    public function setAddressee($addressee)
    {
        return $this->offsetSet(self::ADDRESSEE, $addressee);
    }
}
