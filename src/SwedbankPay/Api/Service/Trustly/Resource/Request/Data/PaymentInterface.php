<?php

namespace SwedbankPay\Api\Service\Trustly\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;

/**
 * Trustly Payment Interface
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
