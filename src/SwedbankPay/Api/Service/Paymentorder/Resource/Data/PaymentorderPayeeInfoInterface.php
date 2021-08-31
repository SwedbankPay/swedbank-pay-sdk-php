<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PayeeInfoInterface;

/**
 * Payment order payee info interface
 *
 * @api
 */
interface PaymentorderPayeeInfoInterface extends PayeeInfoInterface
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
