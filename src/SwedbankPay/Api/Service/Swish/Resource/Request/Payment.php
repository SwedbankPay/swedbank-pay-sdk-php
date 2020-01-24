<?php

namespace SwedbankPay\Api\Service\Swish\Resource\Request;

use SwedbankPay\Api\Service\Payment\Resource\PaymentTrait;
use SwedbankPay\Api\Service\Payment\Resource\Request\Payment as PaymentRequest;
use SwedbankPay\Api\Service\Swish\Resource\Request\Data\PaymentSwishInterface;
use SwedbankPay\Api\Service\Swish\Resource\Request\Data\PaymentInterface;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;

/**
 * Swish payment data object
 */
class Payment extends PaymentRequest implements PaymentInterface
{
    use PaymentTrait;

    /**
     * @return PricesCollection
     */
    public function getPrices()
    {
        return $this->offsetGet(self::PRICES);
    }

    /**
     * @param PricesCollection|array $prices
     * @return $this
     */
    public function setPrices($prices)
    {
        if (!($prices instanceof PricesCollection)) {
            $prices = new PricesCollection($prices);
        }

        return $this->offsetSet(self::PRICES, $prices);
    }

    /**
     * @return PaymentSwishInterface
     */
    public function getSwish()
    {
        return $this->offsetGet(self::SWISH);
    }

    /**
     * @param PaymentSwishInterface $swish
     * @return $this
     */
    public function setSwish($swish)
    {
        return $this->offsetSet(self::SWISH, $swish);
    }
}
