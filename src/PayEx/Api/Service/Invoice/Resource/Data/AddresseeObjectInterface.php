<?php

namespace PayEx\Api\Service\Invoice\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;
use PayEx\Api\Service\Invoice\Resource\Request\Data\AddresseeInterface;

/**
 * Addressee object interface
 *
 * @api
 */
interface AddresseeObjectInterface extends ResourceInterface
{
    const ADDRESSEE = 'addressee';

    /**
     * @return AddresseeInterface
     */
    public function getAddressee();

    /**
     * @param AddresseeInterface $addressee
     * @return $this
     */
    public function setAddressee($addressee);
}
