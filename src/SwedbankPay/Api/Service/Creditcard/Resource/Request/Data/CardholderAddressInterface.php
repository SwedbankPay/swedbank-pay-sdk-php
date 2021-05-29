<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

interface CardholderAddressInterface extends ResourceInterface
{
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const EMAIL = 'email';
    const MSISDN = 'msisdn';
    const STREET_ADDRESS = 'street_address';
    const CO_ADDRESS = 'co_address';
    const CITY = 'city';
    const ZIP_CODE = 'zip_code';
    const COUNTRY_CODE = 'country_code';

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
    public function getStreetAddress();

    /**
     * @param string $streetAddress
     * @return $this
     */
    public function setStreetAddress($streetAddress);

    /**
     * @return string
     */
    public function getCoAddress();

    /**
     * @param string $coAddress
     * @return $this
     */
    public function setCoAddress($coAddress);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getZipCode();

    /**
     * @param string $zipCode
     * @return $this
     */
    public function setZipCode($zipCode);

    /**
     * @return string
     */
    public function getCountryCode();

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode);
}
