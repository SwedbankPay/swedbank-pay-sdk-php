<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Request;

use SwedbankPay\Api\Service\Resource\Request as RequestResource;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerNationalIdentifierInterface;
use SwedbankPay\Api\Service\Consumer\Resource\Request\Data\InitiateConsumerSessionInterface;

/**
 * Consumer data object
 */
class InitiateConsumerSession extends RequestResource implements InitiateConsumerSessionInterface
{
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
    public function getConsumerCountryCode()
    {
        return $this->offsetGet(self::CONSUMER_COUNTRY_CODE);
    }

    /**
     * @param string $consumerCountryCode
     * @return $this
     */
    public function setConsumerCountryCode($consumerCountryCode)
    {
        return $this->offsetSet(self::CONSUMER_COUNTRY_CODE, $consumerCountryCode);
    }

    /**
     * @return ConsumerNationalIdentifierInterface
     */
    public function getNationalIdentifier()
    {
        return $this->offsetGet(self::NATIONAL_IDENTIFIER);
    }

    /**
     * @param string $nationalIdentifier
     * @return $this
     */
    public function setNationalIdentifier($nationalIdentifier)
    {
        return $this->offsetSet(self::NATIONAL_IDENTIFIER, $nationalIdentifier);
    }
}
