<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Consumer national identifier data interface
 *
 * @api
 */
interface ConsumerNationalIdentifierInterface extends ResourceInterface
{
    const SOCIAL_SECURITY_NUMBER = 'social_security_number';
    const COUNTRY_CODE = 'country_code';

    /**
     * @return string
     */
    public function getSocialSecurityNumber();

    /**
     * @param string $socialSecurityNumber
     * @return $this
     */
    public function setSocialSecurityNumber($socialSecurityNumber);

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
