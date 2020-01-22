<?php

namespace SwedbankPay\Api\Service\Invoice\Resource\Request\Data;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

/**
 * Addressee Interface
 *
 * @api
 */
interface AddresseeInterface extends RequestInterface
{
    const SOCIAL_SECURITY_NUMBER = 'social_security_number';
    const ZIP_CODE = 'zip_code';

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
    public function getZipCode();

    /**
     * @param string $zipCode
     * @return $this
     */
    public function setZipCode($zipCode);
}
