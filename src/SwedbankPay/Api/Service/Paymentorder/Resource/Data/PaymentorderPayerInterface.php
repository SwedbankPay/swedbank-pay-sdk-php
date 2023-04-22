<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;
use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payment order payer interface
 *
 * @api
 */
interface PaymentorderPayerInterface extends ResourceInterface
{
    const CONSUMER_PROFILE_REF = 'consumer_profile_ref';
    const PAYER_REFERENCE = 'payer_reference';
    const EMAIL = 'email';
    const MSISDN = 'msisdn';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const WORK_PHONE_NUMBER = 'work_phone_number';
    const HOME_PHONE_NUMBER = 'home_phone_number';
    const SHIPPING_ADDRESS = 'shipping_address';
    const DIGITAL_PRODUCTS = 'digital_products';
    const SHIPPING_ADDRESS_RESTRICTED_COUNTRIES = 'shipping_address_restricted_to_country_codes';

    /**
     * Get Payer Reference.
     *
     * @return string|null
     */
    public function getPayerReference();

    /**
     * Set Payer Reference.
     *
     * @param string|null $payerReference
     * @return $this
     */
    public function setPayerReference($payerReference);

    /**
     * @return string
     */
    public function getConsumerProfileRef();

    /**
     * @param string $consumerProfileRef
     * @return $this
     */
    public function setConsumerProfileRef($consumerProfileRef);

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
     * @return string|null
     */
    public function getFirstName();

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName);

    /**
     * @return string|null
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
     * @return ConsumerAddress
     */
    public function getShippingAddress();

    /**
     * @param ConsumerAddress $shippingAddress
     * @return mixed
     */
    public function setShippingAddress($shippingAddress);

    /**
     * @return bool|null
     */
    public function getDigitalProducts();

    /**
     * @param bool $flag
     * @return $this
     */
    public function setDigitalProducts($flag);

    /**
     * @return array|null
     */
    public function getShippingAddressRestrictedToCountryCodes();

    /**
     * @param array $countries
     *
     * @return $this
     */
    public function setShippingAddressRestrictedToCountryCodes($countries);
}
