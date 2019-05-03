<?php

namespace PayEx\Api\Service\Payment\Resource\Collection\Item;

use PayEx\Framework\DataObjectCollectionItem;
use PayEx\Api\Service\Payment\Resource\Collection\Item\Data\PaymentListItemInterface;

/**
 * Payment payment list data object
 */
class PaymentListItem extends DataObjectCollectionItem implements PaymentListItemInterface
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setId($paymentId)
    {
        return $this->offsetSet(self::ID, $paymentId);
    }

    /**
     * @return string
     */
    public function getInstrument()
    {
        return $this->offsetGet(self::INSTRUMENT);
    }

    /**
     * @param string $instrument
     * @return $this
     */
    public function setInstrument($instrument)
    {
        return $this->offsetSet(self::INSTRUMENT, $instrument);
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->offsetGet(self::CREATED);
    }

    /**
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        return $this->offsetSet(self::CREATED, $created);
    }
}
