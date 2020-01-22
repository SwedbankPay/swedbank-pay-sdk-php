<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\Data;

use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

/**
 * Payment payment list item interface
 *
 * @api
 */
interface PaymentListItemInterface extends DataObjectCollectionItemInterface
{
    const ID = 'id';
    const INSTRUMENT = 'instrument';
    const CREATED = 'created';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setId($paymentId);

    /**
     * @return string
     */
    public function getInstrument();

    /**
     * @param string $instrument
     * @return $this
     */
    public function setInstrument($instrument);

    /**
     * @return string
     */
    public function getCreated();

    /**
     * @param string $created
     * @return $this
     */
    public function setCreated($created);
}
