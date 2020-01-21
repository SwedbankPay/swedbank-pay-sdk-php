<?php

namespace SwedbankPay\Api\Service\Invoice\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\AddresseeInterface;
use SwedbankPay\Api\Service\Resource\Request as RequestResource;

/**
 * Addressee data object
 */
class Addressee extends RequestResource implements AddresseeInterface
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
}
