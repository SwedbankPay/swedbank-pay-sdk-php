<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Resource;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\CreditcardInterface;

/**
 * Credit card data object
 */
class Creditcard extends Resource implements CreditcardInterface
{
    /**
     * @return bool
     */
    public function isNo3DSecure()
    {
        return $this->offsetGet(self::NO_3D_SECURE);
    }

    /**
     * @param bool $no3dSecure
     * @return $this
     */
    public function setNo3DSecure($no3dSecure)
    {
        return $this->offsetSet(self::NO_3D_SECURE, $no3dSecure);
    }

    /**
     * @return bool
     */
    public function isRejectCardNot3DSecureEnrolled()
    {
        return $this->offsetGet(self::REJECT_CARD_NOT_3D_SECURE_ENROLLED);
    }

    /**
     * @param bool $rejectCardNo3dSecure
     * @return $this
     */
    public function setRejectCardNot3DSecureEnrolled($rejectCardNo3dSecure)
    {
        return $this->offsetSet(self::REJECT_CARD_NOT_3D_SECURE_ENROLLED, $rejectCardNo3dSecure);
    }

    /**
     * @return bool
     */
    public function isRejectCreditCards()
    {
        return $this->offsetGet(self::REJECT_CREDIT_CARDS);
    }

    /**
     * @param bool $rejectCreditCards
     * @return $this
     */
    public function setRejectCreditCards($rejectCreditCards)
    {
        return $this->offsetSet(self::REJECT_CREDIT_CARDS, $rejectCreditCards);
    }

    /**
     * @return bool
     */
    public function isRejectDebitCards()
    {
        return $this->offsetGet(self::REJECT_DEBIT_CARDS);
    }

    /**
     * @param bool $rejectDebitCards
     * @return $this
     */
    public function setRejectDebitCards($rejectDebitCards)
    {
        return $this->offsetSet(self::REJECT_DEBIT_CARDS, $rejectDebitCards);
    }

    /**
     * @return bool
     */
    public function isRejectConsumerCards()
    {
        return $this->offsetGet(self::REJECT_CONSUMER_CARDS);
    }

    /**
     * @param bool $rejectConsumerCards
     * @return $this
     */
    public function setRejectConsumerCards($rejectConsumerCards)
    {
        return $this->offsetSet(self::REJECT_CONSUMER_CARDS, $rejectConsumerCards);
    }

    /**
     * @return bool
     *
     */
    public function isRejectCorporateCards()
    {
        return $this->offsetGet(self::REJECT_CORPORATE_CARDS);
    }

    /**
     * @param bool $rejectCorporateCards
     * @return $this
     */
    public function setRejectCorporateCards($rejectCorporateCards)
    {
        return $this->offsetSet(self::REJECT_CORPORATE_CARDS, $rejectCorporateCards);
    }

    /**
     * @return bool
     */
    public function isRejectAuthenticationStatusA()
    {
        return $this->offsetGet(self::REJECT_AUTHENTICATION_STATUS_A);
    }

    /**
     * @param bool $rejectAuthStatusA
     * @return $this
     */
    public function setRejectAuthenticationStatusA($rejectAuthStatusA)
    {
        return $this->offsetSet(self::REJECT_AUTHENTICATION_STATUS_A, $rejectAuthStatusA);
    }
}
