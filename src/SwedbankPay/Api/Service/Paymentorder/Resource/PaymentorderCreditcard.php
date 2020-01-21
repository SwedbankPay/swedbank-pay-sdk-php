<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Service\CreditCard\Resource\Request\Creditcard;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderCreditcardInterface;

/**
 * Payment order credit card data object
 */
class PaymentorderCreditcard extends Creditcard implements PaymentorderCreditcardInterface
{
    /**
     * @return bool
     */
    public function isNo3DSecureForStoredCard()
    {
        return $this->offsetGet(self::NO_3D_SECURE_FOR_STORED_CARD);
    }

    /**
     * @param bool $no3DSecureStoredCard
     * @return $this
     */
    public function setNo3DSecureForStoredCard($no3DSecureStoredCard)
    {
        return $this->offsetSet(self::NO_3D_SECURE_FOR_STORED_CARD, $no3DSecureStoredCard);
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
