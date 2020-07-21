<?php


namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\CardholderShippingAddressInterface;
use SwedbankPay\Api\Service\Resource;

class CardholderShippingAddress extends Resource implements CardholderShippingAddressInterface
{
    /**
     * @return string
     */
    public function getAddressee()
    {
        return $this->offsetGet(self::ADDRESSEE);
    }

    /**
     * @param string $addressee
     * @return $this
     */
    public function setAddressee($addressee)
    {
        return $this->offsetSet(self::ADDRESSEE, $addressee);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->offsetGet(self::EMAIL);
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->offsetSet(self::EMAIL, $email);
    }

    /**
     * @return string
     */
    public function getMsisdn()
    {
        return $this->offsetGet(self::MSISDN);
    }

    /**
     * @param string $msisdn
     * @return $this
     */
    public function setMsisdn($msisdn)
    {
        return $this->offsetSet(self::MSISDN, $msisdn);
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->offsetGet(self::STREET_ADDRESS);
    }

    /**
     * @param string $streetAddress
     * @return $this
     */
    public function setStreetAddress($streetAddress)
    {
        return $this->offsetSet(self::STREET_ADDRESS, $streetAddress);
    }

    /**
     * @return string
     */
    public function getCoAddress()
    {
        return $this->offsetGet(self::CO_ADDRESS);
    }

    /**
     * @param string $coAddress
     * @return $this
     */
    public function setCoAddress($coAddress)
    {
        return $this->offsetSet(self::CO_ADDRESS, $coAddress);
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->offsetGet(self::ZIP_CODE);
    }

    /**
     * @param string $zipCode
     * @return $this
     */
    public function setZipCode($zipCode)
    {
        return $this->offsetSet(self::ZIP_CODE, $zipCode);
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->offsetGet(self::CITY);
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        return $this->offsetSet(self::CITY, $city);
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->offsetGet(self::COUNTRY_CODE);
    }

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        return $this->offsetSet(self::COUNTRY_CODE, $countryCode);
    }
}
