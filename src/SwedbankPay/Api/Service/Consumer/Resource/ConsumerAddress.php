<?php

namespace SwedbankPay\Api\Service\Consumer\Resource;

use SwedbankPay\Api\Service\Resource;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;

/**
 * Consumer address resource object
 */
class ConsumerAddress extends Resource implements ConsumerAddressInterface
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
