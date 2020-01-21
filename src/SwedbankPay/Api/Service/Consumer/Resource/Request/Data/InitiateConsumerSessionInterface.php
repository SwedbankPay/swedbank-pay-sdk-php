<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Request\Data;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerNationalIdentifierInterface;

/**
 * Consumer session request resource interface
 *
 * @api
 */
interface InitiateConsumerSessionInterface extends RequestInterface
{
    const MSISDN = 'msisdn';
    const EMAIL = 'email';
    const CONSUMER_COUNTRY_CODE = 'consumer_country_code';
    const NATIONAL_IDENTIFIER = 'national_identifier';

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
    public function getEmail();

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getConsumerCountryCode();

    /**
     * @param string $consumerCountryCode
     * @return $this
     */
    public function setConsumerCountryCode($consumerCountryCode);

    /**
     * @return ConsumerNationalIdentifierInterface
     */
    public function getNationalIdentifier();

    /**
     * @param ConsumerNationalIdentifierInterface $nationalIdentifier
     * @return $this
     */
    public function setNationalIdentifier($nationalIdentifier);
}
