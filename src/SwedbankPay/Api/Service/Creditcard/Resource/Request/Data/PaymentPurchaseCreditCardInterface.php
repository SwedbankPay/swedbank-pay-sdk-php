<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

/**
 * Purchase credit card interface
 *
 * @api
 */
interface PaymentPurchaseCreditCardInterface extends CreditCardInterface
{
    const MAIL_ORDER_TELEPHONE_ORDER = 'mail_order_telephone_order';
    const REJECT_AUTHENTICATION_STATUS_U = 'reject_authentication_status_u';

    /**
     * @return bool
     */
    public function isMailOrderTelephoneOrder();

    /**
     * @param bool $mailOrderTelephone
     * @return $this
     */
    public function setMailOrderTelephoneOrder($mailOrderTelephone);

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
