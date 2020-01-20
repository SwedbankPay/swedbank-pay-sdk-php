<?php

namespace PayEx\Api\Service\Payment\Resource\Request\Data;

use PayEx\Api\Service\Payment\Resource\Data\PaymentInterface;

/**
 * Payment request resource interface
 *
 * @api
 */
interface PaymentRequestInterface extends PaymentInterface
{
    const PREFILL_INFO = 'prefill_info';

    /**
     * @return PrefillInfoInterface
     */
    public function getPrefillInfo();

    /**
     * @param PrefillInfoInterface $prefillInfo
     * @return $this
     */
    public function setPrefillInfo($prefillInfo);
}
