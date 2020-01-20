<?php

namespace SwedbankPay\Api\Service\Consumer\Resource\Response;

use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Consumer\Resource\Response\Data\GetShippingDetailsInterface;

/**
 * Get Shipping Details response resource object
 */
class GetShippingDetails extends ResponseResource implements GetShippingDetailsInterface
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
    public function getShippingAddress()
    {
        return $this->offsetGet(self::SHIPPING_ADDRESS);
    }

    /**
     * @param ConsumerAddressInterface $shippingAddress
     * @return $this
     */
    public function setShippingAddress(ConsumerAddressInterface $shippingAddress)
    {
        return $this->offsetSet(self::SHIPPING_ADDRESS, $shippingAddress);
    }
}
