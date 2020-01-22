<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Response\Data;

use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;

/**
 * Consumer address data interface
 *
 * @api
 */
interface GetBillingDetailsInterface extends ResponseInterface
{
    const EMAIL = 'email';
    const MSISDN = 'msisdn';
    const BILLING_ADDRESS = 'billing_address';

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
    public function getBillingAddress();

    /**
     * @param ConsumerAddressInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress(ConsumerAddressInterface $billingAddress);
}
