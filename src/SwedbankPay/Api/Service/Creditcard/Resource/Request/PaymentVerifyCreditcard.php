<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentVerifyCreditCardInterface;

/**
 * Verify credit card
 */
class PaymentVerifyCreditcard extends Creditcard implements PaymentVerifyCreditCardInterface
{
    /**
     * @return bool
     */
    public function isNoCvc()
    {
        return $this->offsetGet(self::NO_CVC);
    }

    /**
     * @param bool $noCvc
     * @return $this
     */
    public function setNoCvc($noCvc)
    {
        return $this->offsetSet(self::NO_CVC, $noCvc);
    }
}
