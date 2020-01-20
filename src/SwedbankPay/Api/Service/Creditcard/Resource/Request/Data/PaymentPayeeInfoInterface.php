<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PayeeInfoInterface;

/**
 * Card payment payee info interface
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
