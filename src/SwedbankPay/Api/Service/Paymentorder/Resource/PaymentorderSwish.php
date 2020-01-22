<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderSwishInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payment order swish data object
 */
class PaymentorderSwish extends Resource implements PaymentorderSwishInterface
{

    /**
     * @return bool
     */
    public function isEnableEcomOnly()
    {
        return $this->offsetGet(self::ENABLE_ECOM_ONLY);
    }

    /**
     * @param bool $enableEcomOnly
     * @return $this
     */
    public function setEnableEcomOnly($enableEcomOnly)
    {
        return $this->offsetSet(self::ENABLE_ECOM_ONLY, $enableEcomOnly);
    }
}
