<?php

namespace SwedbankPay\Api\Service\Vipps\Resource\Request;

use SwedbankPay\Api\Service\Vipps\Resource\Request\Data\PaymentUrlInterface;
use SwedbankPay\Api\Service\Payment\Resource\Request\Url;

/**
 * Vipps payment url data object
 */
class PaymentUrl extends Url implements PaymentUrlInterface
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
