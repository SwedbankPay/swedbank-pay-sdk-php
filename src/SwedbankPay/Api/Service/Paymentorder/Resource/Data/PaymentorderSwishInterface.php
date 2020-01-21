<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;

/**
 * Payment order swish interface
 *
 * @api
 */
interface PaymentorderSwishInterface extends ResourceInterface
{
    const ENABLE_ECOM_ONLY = 'enable_ecom_only';

    /**
     * @return bool
     */
    public function isEnableEcomOnly();

    /**
     * @param bool $enableEcomOnly
     * @return $this
     */
    public function setEnableEcomOnly($enableEcomOnly);
}
