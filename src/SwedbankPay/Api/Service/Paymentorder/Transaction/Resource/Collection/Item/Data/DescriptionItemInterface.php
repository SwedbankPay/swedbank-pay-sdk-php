<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\Data;

use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

/**
 * Transaction item descriptions interface
 *
 * @api
 */
interface DescriptionItemInterface extends DataObjectCollectionItemInterface
{
    const AMOUNT = 'amount';
    const DESCRIPTION = 'description';

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
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);
}
