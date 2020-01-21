<?php

namespace SwedbankPay\Api\Service\Invoice\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;

/**
 * Invoice Payment Interface
 *
 * @api
 */
interface PaymentInterface extends PaymentRequestInterface
{
    const PRICES = 'prices';

    /**
     * @return PricesCollection
     */
    public function getPrices();

    /**
     * @param PricesCollection|array $prices
     * @return $this
     */
    public function setPrices($prices);
}
