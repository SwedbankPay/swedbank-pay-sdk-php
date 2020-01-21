<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Credit card interface
 *
 * @api
 */
interface CreditcardInterface extends ResourceInterface
{
    const NO_3D_SECURE = 'no_3d_secure';
    const REJECT_CARD_NOT_3D_SECURE_ENROLLED = 'reject_card_not_3d_secure_enrolled';
    const REJECT_CREDIT_CARDS = 'reject_credit_cards';
    const REJECT_DEBIT_CARDS = 'reject_debit_cards';
    const REJECT_CONSUMER_CARDS = 'reject_consumer_cards';
    const REJECT_CORPORATE_CARDS = 'reject_corporate_cards';
    const REJECT_AUTHENTICATION_STATUS_A = 'reject_authentication_status_a';

    /**
     * @return bool
     */
    public function isNo3DSecure();

    /**
     * @param bool $no3dSecure
     * @return $this
     */
    public function setNo3DSecure($no3dSecure);

    /**
     * @return bool
     */
    public function isRejectCardNot3DSecureEnrolled();

    /**
     * @param bool $rejectCardNo3dSecure
     * @return $this
     */
    public function setRejectCardNot3DSecureEnrolled($rejectCardNo3dSecure);

    /**
     * @return bool
     */
    public function isRejectCreditCards();

    /**
     * @param bool $rejectCreditCards
     * @return $this
     */
    public function setRejectCreditCards($rejectCreditCards);

    /**
     * @return bool
     */
    public function isRejectDebitCards();

    /**
     * @param bool $rejectDebitCards
     * @return $this
     */
    public function setRejectDebitCards($rejectDebitCards);

    /**
     * @return bool
     */
    public function isRejectConsumerCards();

    /**
     * @param bool $rejectConsumerCards
     * @return $this
     */
    public function setRejectConsumerCards($rejectConsumerCards);

    /**
     * @return bool
     *
     */
    public function isRejectCorporateCards();

    /**
     * @param bool $rejectCorporateCards
     * @return $this
     */
    public function setRejectCorporateCards($rejectCorporateCards);

    /**
     * @return bool
     */
    public function isRejectAuthenticationStatusA();

    /**
     * @param bool $rejectAuthStatusA
     * @return $this
     */
    public function setRejectAuthenticationStatusA($rejectAuthStatusA);
}
