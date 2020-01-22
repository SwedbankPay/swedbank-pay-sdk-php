<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Prefill info interface
 *
 * @api
 */
interface PrefillInfoInterface extends ResourceInterface
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
