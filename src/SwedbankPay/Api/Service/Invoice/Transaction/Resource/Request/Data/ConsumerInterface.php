<?php

namespace SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

/**
 * Consumer Interface
 *
 * @api
 */
interface ConsumerInterface extends RequestInterface
{
    const SOCIAL_SECURITY_NUMBER = 'social_security_number';
    const CUSTOMER_NUMBER = 'customer_number';
    const NAME = 'name';
    const EMAIL = 'email';
    const MSISDN = 'msisdn';
    const IP = 'ip';

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
    public function getCustomerNumber();

    /**
     * @param string $customerNumber
     * @return $this
     */
    public function setCustomerNumber($customerNumber);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

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
     * @return string
     */
    public function getIp();

    /**
     * @param string $consumerIp
     * @return $this
     */
    public function setIp($consumerIp);
}
