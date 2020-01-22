<?php

namespace SwedbankPay\Api\Service\Consumer\Resource;

use SwedbankPay\Api\Service\Resource;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerNationalIdentifierInterface;

/**
 * Consumer national identifier resource object
 */
class ConsumerNationalIdentifier extends Resource implements ConsumerNationalIdentifierInterface
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
