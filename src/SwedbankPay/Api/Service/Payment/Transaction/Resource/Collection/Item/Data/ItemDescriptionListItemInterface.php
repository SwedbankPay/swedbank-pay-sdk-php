<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data;

interface ItemDescriptionListItemInterface
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
