<?php

namespace PayEx\Api\Service\Payment\Resource\Request\Data;

use PayEx\Api\Service\Data\ResourceInterface;

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
