<?php

namespace SwedbankPay\Api\Service\Swish\Resource;

use SwedbankPay\Api\Service\Payment\Resource\Request\PayeeInfo;
use SwedbankPay\Api\Service\Swish\Resource\Data\PaymentPayeeInfoInterface;

/**
 * Swish payment payee info data object
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
