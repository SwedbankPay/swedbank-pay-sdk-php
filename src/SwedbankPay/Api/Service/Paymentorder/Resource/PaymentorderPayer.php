<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderPayerInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payment order payer data object
 */
class PaymentorderPayer extends Resource implements PaymentorderPayerInterface
{

    /**
     * @return string
     */
    public function getConsumerProfileRef()
    {
        return $this->offsetGet(self::CONSUMER_PROFILE_REF);
    }

    /**
     * @param string $consumerProfileRef
     * @return $this
     */
    public function setConsumerProfileRef($consumerProfileRef)
    {
        return $this->offsetSet(self::CONSUMER_PROFILE_REF, $consumerProfileRef);
    }

    /**
     * Get Payer Reference.
     *
     * @return string|null
     */
    public function getPayerReference()
    {
        return $this->offsetGet(self::PAYER_REFERENCE);
    }

    /**
     * Set Payer Reference.
     *
     * @param string|null $payerReference
     * @return $this
     */
    public function setPayerReference($payerReference)
    {
        return $this->offsetSet(self::PAYER_REFERENCE, $payerReference);
    }

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
     * @return string
     */
    public function getWorkPhoneNumber()
    {
        return $this->offsetGet(self::WORK_PHONE_NUMBER);
    }

    /**
     * @param string $workPhoneNumber
     * @return $this
     */
    public function setWorkPhoneNumber($workPhoneNumber)
    {
        return $this->offsetSet(self::WORK_PHONE_NUMBER, $workPhoneNumber);
    }

    /**
     * @return string
     */
    public function getHomePhoneNumber()
    {
        return $this->offsetGet(self::HOME_PHONE_NUMBER);
    }

    /**
     * @param string $homePhoneNumber
     * @return $this
     */
    public function setHomePhoneNumber($homePhoneNumber)
    {
        return $this->offsetSet(self::HOME_PHONE_NUMBER, $homePhoneNumber);
    }

    /**
     * @return ConsumerAddress
     */
    public function getShippingAddress()
    {
        return $this->offsetGet(self::SHIPPING_ADDRESS);
    }

    /**
     * @param ConsumerAddress $shippingAddress
     * @return $this
     */
    public function setShippingAddress($shippingAddress)
    {
        return $this->offsetSet(self::SHIPPING_ADDRESS, $shippingAddress);
    }
}
