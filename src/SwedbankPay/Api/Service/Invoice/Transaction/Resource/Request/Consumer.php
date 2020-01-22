<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\ConsumerInterface;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

/**
 * Consumer data object
 */
class Consumer extends RequestResource implements ConsumerInterface
{
    /**
     * @return string
     */
    public function getSocialSecurityNumber()
    {
        return $this->offsetGet(self::SOCIAL_SECURITY_NUMBER);
    }

    /**
     * @param string $socialSecurityNumber
     * @return $this
     */
    public function setSocialSecurityNumber($socialSecurityNumber)
    {
        return $this->offsetSet(self::SOCIAL_SECURITY_NUMBER, $socialSecurityNumber);
    }

    /**
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->offsetGet(self::CUSTOMER_NUMBER);
    }

    /**
     * @param string $customerNumber
     * @return $this
     */
    public function setCustomerNumber($customerNumber)
    {
        return $this->offsetSet(self::CUSTOMER_NUMBER, $customerNumber);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->offsetGet(self::NAME);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->offsetSet(self::NAME, $name);
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
    public function getIp()
    {
        return $this->offsetGet(self::IP);
    }

    /**
     * @param string $consumerIp
     * @return $this
     */
    public function setIp($consumerIp)
    {
        return $this->offsetSet(self::IP, $consumerIp);
    }
}
