<?php

namespace SwedbankPay\Api\Service\MobilePay\Resource\Request;

use SwedbankPay\Api\Service\Payment\Resource\Request\PayeeInfo;
use SwedbankPay\Api\Service\MobilePay\Resource\Request\Data\PaymentPayeeInfoInterface;

/**
 * MobilePay payment payee info data object
 */
class PaymentPayeeInfo extends PayeeInfo implements PaymentPayeeInfoInterface
{
    /**
     * @return string
     */
    public function getSubsite()
    {
        return $this->offsetGet(self::SUBSITE);
    }

    /**
     * @param string $subsite
     * @return $this
     */
    public function setSubsite($subsite)
    {
        return $this->offsetSet(self::SUBSITE, $subsite);
    }
}
