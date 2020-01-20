<?php

namespace SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

/**
 * Transaction Authorization Interface
 *
 * @api
 */
interface TransactionAuthorizationInterface extends RequestInterface
{
    const CARD_NUMBER = 'card_number';
    const CARD_EXPIRY_MONTH = 'card_expiry_month';
    const CARD_EXPIRY_YEAR = 'card_expiry_year';
    const CARD_VERIFICATION_CODE = 'card_verification_code';
    const CARDHOLDER_NAME = 'cardholder_name';

    /**
     * @return string
     */
    public function getCardNumber();

    /**
     * @param string $cardNumber
     * @return $this
     */
    public function setCardNumber($cardNumber);

    /**
     * @return int
     */
    public function getCardExpiryMonth();

    /**
     * @param int $cardExpiryMonth
     * @return $this
     */
    public function setCardExpiryMonth($cardExpiryMonth);

    /**
     * @return int
     */
    public function getCardExpiryYear();

    /**
     * @param int $cardExpiryYear
     * @return $this
     */
    public function setCardExpiryYear($cardExpiryYear);

    /**
     * @return string
     */
    public function getCardVerificationCode();

    /**
     * @param string $cardVerificationCode
     * @return $this
     */
    public function setCardVerificationCode($cardVerificationCode);

    /**
     * @return string
     */
    public function getCardholderName();

    /**
     * @param string $cardholderName
     * @return $this
     */
    public function setCardholderName($cardholderName);
}
