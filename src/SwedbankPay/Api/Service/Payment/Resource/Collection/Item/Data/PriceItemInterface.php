<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Collection\Item\Data;

use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

/**
 * Payment price item interface
 *
 * @api
 */
interface PriceItemInterface extends DataObjectCollectionItemInterface
{
    const TYPE = 'type';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vatAmount';

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type);

    /**
     * @return int
     */
    public function getAmount();

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return int
     */
    public function getVatAmount();

    /**
     * @param int $vatAmount
     * @return $this
     */
    public function setVatAmount($vatAmount);
}
