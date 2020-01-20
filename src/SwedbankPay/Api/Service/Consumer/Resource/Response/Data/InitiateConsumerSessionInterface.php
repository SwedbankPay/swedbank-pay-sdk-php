<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Response\Data;

use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Consumer address data interface
 *
 * @api
 */
interface InitiateConsumerSessionInterface extends ResponseInterface
{
    const TOKEN = 'token';

    /**
     * @return string
     */
    public function getToken();

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token);
}
