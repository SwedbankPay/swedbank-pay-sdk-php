<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

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
