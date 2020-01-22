<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\Data\TransactionAuthorizationInterface;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

/**
 * Transaction authorization data object
 */
class TransactionAuthorization extends RequestResource implements TransactionAuthorizationInterface
{
    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->offsetGet(self::CARD_NUMBER);
    }

    /**
     * @param string $cardNumber
     * @return $this
     */
    public function setCardNumber($cardNumber)
    {
        return $this->offsetSet(self::CARD_NUMBER, $cardNumber);
    }

    /**
     * @return int
     */
    public function getCardExpiryMonth()
    {
        return $this->offsetGet(self::CARD_EXPIRY_MONTH);
    }

    /**
     * @param int $cardExpiryMonth
     * @return $this
     */
    public function setCardExpiryMonth($cardExpiryMonth)
    {
        return $this->offsetSet(self::CARD_EXPIRY_MONTH, $cardExpiryMonth);
    }

    /**
     * @return int
     */
    public function getCardExpiryYear()
    {
        return $this->offsetGet(self::CARD_EXPIRY_YEAR);
    }

    /**
     * @param int $cardExpiryYear
     * @return $this
     */
    public function setCardExpiryYear($cardExpiryYear)
    {
        return $this->offsetSet(self::CARD_EXPIRY_YEAR, $cardExpiryYear);
    }

    /**
     * @return string
     */
    public function getCardVerificationCode()
    {
        return $this->offsetGet(self::CARD_VERIFICATION_CODE);
    }

    /**
     * @param string $cardVerificationCode
     * @return $this
     */
    public function setCardVerificationCode($cardVerificationCode)
    {
        return $this->offsetSet(self::CARD_VERIFICATION_CODE, $cardVerificationCode);
    }

    /**
     * @return string
     */
    public function getCardholderName()
    {
        return $this->offsetGet(self::CARDHOLDER_NAME);
    }

    /**
     * @param string $cardholderName
     * @return $this
     */
    public function setCardholderName($cardholderName)
    {
        return $this->offsetSet(self::CARDHOLDER_NAME, $cardholderName);
    }
}
