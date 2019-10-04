<?php

namespace PayEx\Api\Service\Paymentorder\Resource;

use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderUrlInterface;
use PayEx\Api\Service\Payment\Resource\Request\Url;

/**
 * Payment order url data object
 */
class PaymentorderUrl extends Url implements PaymentorderUrlInterface
{

    /**
     * @return array
     */
    public function getHostUrls()
    {
        return $this->offsetGet(self::HOST_URLS);
    }

    /**
     * @param array $hostUrls
     * @return $this
     */
    public function setHostUrls($hostUrls)
    {
        return $this->offsetSet(self::HOST_URLS, $hostUrls);
    }
}
