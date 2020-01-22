<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentPurchaseCreditCardInterface;

/**
 * Purchase credit card
 */
class PaymentPurchaseCreditcard extends Creditcard implements PaymentPurchaseCreditCardInterface
{
    /**
     * @return bool
     */
    public function isMailOrderTelephoneOrder()
    {
        return $this->offsetGet(self::MAIL_ORDER_TELEPHONE_ORDER);
    }

    /**
     * @param bool $mailOrderTelephone
     * @return $this
     */
    public function setMailOrderTelephoneOrder($mailOrderTelephone)
    {
        return $this->offsetSet(self::MAIL_ORDER_TELEPHONE_ORDER, $mailOrderTelephone);
    }

    /**
     * @return bool
     */
    public function isRejectAuthenticationStatusU()
    {
        return $this->offsetGet(self::REJECT_AUTHENTICATION_STATUS_U);
    }

    /**
     * @param bool $rejectAuthStatusU
     * @return $this
     */
    public function setRejectAuthenticationStatusU($rejectAuthStatusU)
    {
        return $this->offsetSet(self::REJECT_AUTHENTICATION_STATUS_U, $rejectAuthStatusU);
    }
}
