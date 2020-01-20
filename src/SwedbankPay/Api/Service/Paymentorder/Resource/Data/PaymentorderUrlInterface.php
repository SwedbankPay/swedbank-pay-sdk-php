<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\UrlInterface;

/**
 * Payment order url interface
 *
 * @api
 */
interface PaymentorderUrlInterface extends UrlInterface
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
