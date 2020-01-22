<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Consumer data interface
 *
 * @api
 */
interface ConsumerInterface extends ResourceInterface
{
    const TOKEN = 'token';
    const NATIONAL_IDENTIFIER = 'national_identifier';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const EMAIL = 'email';
    const MSISDN = 'msisdn';
    const LEGAL_ADDRESS = 'legal_address';
    const BILLING_ADDRESS = 'billing_address';
    const SHIPPING_ADDRESS = 'shipping_address';

    /**
     * @return string
     */
    public function getToken();

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token);

    /**
     * @return ConsumerNationalIdentifierInterface
     */
    public function getNationalIdentifier();

    /**
     * @param ConsumerNationalIdentifierInterface $nationalIdentifier
     * @return $this
     */
    public function setNationalIdentifier($nationalIdentifier);

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
     * @return ConsumerAddressInterface
     */
    public function getLegalAddress();

    /**
     * @param ConsumerAddressInterface $legalAddress
     * @return $this
     */
    public function setLegalAddress($legalAddress);

    /**
     * @return ConsumerAddressInterface
     */
    public function getBillingAddress();

    /**
     * @param ConsumerAddressInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress($billingAddress);

    /**
     * @return ConsumerAddressInterface
     */
    public function getShippingAddress();

    /**
     * @param ConsumerAddressInterface $shippingAddress
     * @return $this
     */
    public function setShippingAddress($shippingAddress);
}
