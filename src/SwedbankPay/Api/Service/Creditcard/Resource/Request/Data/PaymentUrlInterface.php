<?php

namespace PayEx\Api\Service\Creditcard\Resource\Request\Data;

use PayEx\Api\Service\Payment\Resource\Request\Data\UrlInterface;

/**
 * Card payment url interface
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
