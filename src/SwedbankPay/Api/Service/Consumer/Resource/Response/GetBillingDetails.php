<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Response;

use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Consumer\Resource\Response\Data\GetBillingDetailsInterface;

/**
 * Get Billing Details response resource object
 */
class GetBillingDetails extends ResponseResource implements GetBillingDetailsInterface
{
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
     * @return ConsumerAddressInterface
     */
    public function getBillingAddress()
    {
        return $this->offsetGet(self::BILLING_ADDRESS);
    }

    /**
     * @param ConsumerAddressInterface $billingAddress
     * @return $this
     */
    public function setBillingAddress(ConsumerAddressInterface $billingAddress)
    {
        return $this->offsetSet(self::BILLING_ADDRESS, $billingAddress);
    }
}
