<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\CreditCard\Resource\Request\Data\CreditcardInterface;

/**
 * Payment order credit card interface
 *
 * @api
 */
interface PaymentorderCreditcardInterface extends CreditcardInterface
{
    const NO_3D_SECURE_FOR_STORED_CARD = 'no_3d_secure_for_stored_card';
    const REJECT_AUTHENTICATION_STATUS_U = 'reject_authentication_status_u';

    /**
     * @return bool
     */
    public function isNo3DSecureForStoredCard();

    /**
     * @param bool $no3DSecureStoredCard
     * @return $this
     */
    public function setNo3DSecureForStoredCard($no3DSecureStoredCard);

    /**
     * @return bool
     */
    public function isRejectAuthenticationStatusU();

    /**
     * @param bool $rejectAuthStatusU
     * @return $this
     */
    public function setRejectAuthenticationStatusU($rejectAuthStatusU);
}
