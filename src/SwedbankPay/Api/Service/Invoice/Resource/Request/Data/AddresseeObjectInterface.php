<?php

namespace SwedbankPay\Api\Service\Invoice\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\AddresseeInterface;

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
