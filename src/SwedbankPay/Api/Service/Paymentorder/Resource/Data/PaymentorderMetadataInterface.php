<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payment order metadata interface
 *
 * @api
 */
interface PaymentorderMetadataInterface extends ResourceInterface
{
    const KEY1 = 'key1';
    const KEY2 = 'key2';
    const KEY3 = 'key3';
    const KEY4 = 'key4';

    /**
     * @return string
     */
    public function getKey1();

    /**
     * @param string $key1
     * @return $this
     */
    public function setKey1($key1);

    /**
     * @return int
     */
    public function getKey2();

    /**
     * @param int $key2
     * @return $this
     */
    public function setKey2($key2);

    /**
     * @return float
     */
    public function getKey3();

    /**
     * @param float $key3
     * @return $this
     */
    public function setKey3($key3);

    /**
     * @return mixed
     */
    public function getKey4();

    /**
     * @param mixed $key4
     * @return $this
     */
    public function setKey4($key4);
}
