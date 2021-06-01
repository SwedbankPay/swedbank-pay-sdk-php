<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

interface PaymentCardholderInterface extends ResourceInterface
{
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const EMAIL = 'email';
    const MSISDN = 'msisdn';
    const WORK_PHONE_NUMBER = 'work_phone_number';
    const HOME_PHONE_NUMBER = 'home_phone_number';
    const BILLING_ADDRESS = 'billing_address';
    const SHIPPING_ADDRESS = 'shipping_address';
    const ACCOUNT_INFO = 'account_info';


    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getMsisdn();

    /**
     * @param string $msisdn
     * @return $this
     */
    public function setMsisdn($msisdn);

    /**
     * @return string
     */
    public function getWorkPhoneNumber();

    /**
     * @param string $workPhoneNumber
     * @return $this
     */
    public function setWorkPhoneNumber($workPhoneNumber);

    /**
     * @return string
     */
    public function getHomePhoneNumber();

    /**
     * @param string $homePhoneNumber
     * @return $this
     */
    public function setHomePhoneNumber($homePhoneNumber);

    /**
     * @return CardholderAddressInterface
     */
    public function getBillingAddress();

    /**
     * @param CardholderAddressInterface $billingAddress
     *
     * @return mixed
     */
    public function setBillingAddress($billingAddress);

    /**
     * @return CardholderAddressInterface
     */
    public function getShippingAddress();

    /**
     * @param CardholderAddressInterface $shippingAddress
     *
     * @return mixed
     */
    public function setShippingAddress($shippingAddress);

    /**
     * @return CardholderAccountInfoInterface
     */
    public function getAccountInfo();

    /**
     * @param CardholderAccountInfoInterface $accountInfo
     *
     * @return $this
     */
    public function setAccountInfo($accountInfo);
}
