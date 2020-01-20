<?php

namespace PayEx\Api\Service\Invoice\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;

/**
 * Invoice payment prefill info interface
 *
 * @api
 */
interface PaymentPrefillInfoInterface extends ResourceInterface
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
