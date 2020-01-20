<?php

namespace PayEx\Api\Service\Invoice\Resource;

use PayEx\Api\Service\Invoice\Resource\Data\AddresseeObjectInterface;
use PayEx\Api\Service\Invoice\Resource\Request\Data\AddresseeInterface;
use PayEx\Api\Service\Resource;

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
