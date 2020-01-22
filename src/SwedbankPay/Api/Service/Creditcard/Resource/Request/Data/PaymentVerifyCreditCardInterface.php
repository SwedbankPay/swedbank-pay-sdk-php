<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

/**
 * Verify credit card interface
 *
 * @api
 */
interface PaymentVerifyCreditCardInterface extends CreditCardInterface
{
    const NO_CVC = 'no_cvc';

    /**
     * @return bool
     */
    public function isNoCvc();

    /**
     * @param bool $noCvc
     * @return $this
     */
    public function setNoCvc($noCvc);
}
