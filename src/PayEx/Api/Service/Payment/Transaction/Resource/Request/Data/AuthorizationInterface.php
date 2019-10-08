<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Request\Data;

use PayEx\Api\Service\Resource\Data\RequestInterface;

/**
 * Authorization Interface
 *
 * @api
 */
interface AuthorizationInterface extends RequestInterface
{
    const MSISDN = 'msisdn';

    /**
     * @return string
     */
    public function getMsisdn();

    /**
     * @param string $msisdn
     * @return $this
     */
    public function setMsisdn($msisdn);
}
