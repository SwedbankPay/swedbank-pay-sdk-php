<?php

namespace SwedbankPay\Api\Service\MobilePay\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\UrlInterface;

/**
 * MobilePay payment url interface
 *
 * @api
 */
interface PaymentUrlInterface extends UrlInterface
{
    const HOST_URLS = 'host_urls';

    /**
     * @return array
     */
    public function getHostUrls();

    /**
     * @param array $hostUrls
     * @return $this
     */
    public function setHostUrls($hostUrls);
}
