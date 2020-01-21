<?php

namespace SwedbankPay\Api\Service\Consumer\Resource;

use SwedbankPay\Api\Service\Resource;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerInterface;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerNationalIdentifierInterface;

/**
 * Consumer resource object
 */
class Consumer extends Resource implements ConsumerInterface
{

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->offsetGet(self::TOKEN);
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        return $this->offsetSet(self::TOKEN, $token);
    }

    /**
     * @return ConsumerNationalIdentifierInterface
     */
    public function getNationalIdentifier()
    {
        return $this->offsetGet(self::NATIONAL_IDENTIFIER);
    }

    /**
     * @param ConsumerNationalIdentifierInterface $nationalIdentifier
     * @return $this
     */
    public function setNationalIdentifier($nationalIdentifier)
    {
        return $this->offsetSet(self::NATIONAL_IDENTIFIER, $nationalIdentifier);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->offsetGet(self::FIRST_NAME);
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        return $this->offsetSet(self::FIRST_NAME, $firstName);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->offsetGet(self::LAST_NAME);
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        return $this->offsetSet(self::LAST_NAME, $lastName);
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
     * @return ConsumerAddressInterface
     */
    public function getLegalAddress()
    {
        return $this->offsetGet(self::LEGAL_ADDRESS);
    }

    /**
     * @param ConsumerAddressInterface $legalAddress
     * @return $this
     */
    public function setLegalAddress($legalAddress)
    {
        return $this->offsetSet(self::LEGAL_ADDRESS, $legalAddress);
    }

    /**
     * @return ConsumerAddressInterface
     */
    public function getBillingAddress()
    {
        return $this->offsetGet(self::BILLING_ADDRESS);
    }

    /**
     * @param ConsumerAddressInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress($billingAddress)
    {
        return $this->offsetSet(self::BILLING_ADDRESS, $billingAddress);
    }

    /**
     * @return ConsumerAddressInterface
     */
    public function getShippingAddress()
    {
        return $this->offsetGet(self::SHIPPING_ADDRESS);
    }

    /**
     * @param ConsumerAddressInterface $shippingAddress
     * @return $this
     */
    public function setShippingAddress($shippingAddress)
    {
        return $this->offsetSet(self::SHIPPING_ADDRESS, $shippingAddress);
    }
}
