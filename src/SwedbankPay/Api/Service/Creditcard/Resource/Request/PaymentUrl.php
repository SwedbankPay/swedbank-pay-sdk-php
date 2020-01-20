<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentUrlInterface;
use SwedbankPay\Api\Service\Payment\Resource\Request\Url;

/**
 * Card payment url data object
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
