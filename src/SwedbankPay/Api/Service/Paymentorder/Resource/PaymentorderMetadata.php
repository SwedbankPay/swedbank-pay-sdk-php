<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderMetadataInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payment order metadata data object
 */
class PaymentorderMetadata extends Resource implements PaymentorderMetadataInterface
{

    /**
     * @return string
     */
    public function getKey1()
    {
        return $this->offsetGet(self::KEY1);
    }

    /**
     * @param string $key1
     * @return $this
     */
    public function setKey1($key1)
    {
        return $this->offsetSet(self::KEY1, $key1);
    }

    /**
     * @return int
     */
    public function getKey2()
    {
        return $this->offsetGet(self::KEY2);
    }

    /**
     * @param int $key2
     * @return $this
     */
    public function setKey2($key2)
    {
        return $this->offsetSet(self::KEY2, $key2);
    }

    /**
     * @return float
     */
    public function getKey3()
    {
        return $this->offsetGet(self::KEY3);
    }

    /**
     * @param float $key3
     * @return $this
     */
    public function setKey3($key3)
    {
        return $this->offsetSet(self::KEY3, $key3);
    }

    /**
     * @return mixed
     */
    public function getKey4()
    {
        return $this->offsetGet(self::KEY4);
    }

    /**
     * @param mixed $key4
     * @return $this
     */
    public function setKey4($key4)
    {
        return $this->offsetSet(self::KEY4, $key4);
    }
}
