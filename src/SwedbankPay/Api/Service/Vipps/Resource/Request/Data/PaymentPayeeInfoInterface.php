<?php

namespace SwedbankPay\Api\Service\Vipps\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PayeeInfoInterface;

/**
 * Vipps payment payee info interface
 *
 * @api
 */
interface PaymentPayeeInfoInterface extends PayeeInfoInterface
{
    const SUBSITE = 'subsite';

    /**
     * @return string
     */
    public function getSubsite();

    /**
     * @param string $subsite
     * @return $this
     */
    public function setSubsite($subsite);
}
