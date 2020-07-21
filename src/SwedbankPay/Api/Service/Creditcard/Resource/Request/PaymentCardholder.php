<?php


namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\CardholderShippingAddressInterface;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentCardholderInterface;
use SwedbankPay\Api\Service\Resource;

class PaymentCardholder extends Resource implements PaymentCardholderInterface
{
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->offsetGet(self::FIRST_NAME);
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        return $this->offsetSet(self::FIRST_NAME, $firstName);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->offsetGet(self::LAST_NAME);
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        return $this->offsetSet(self::LAST_NAME, $lastName);
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
     * @return CardholderShippingAddressInterface
     */
    public function getShippingAddress()
    {
        return $this->offsetGet(self::SHIPPING_ADDRESS);
    }

    /**
     * @param CardholderShippingAddressInterface $shippingAddress
     * @return $this
     */
    public function setShippingAddress($shippingAddress)
    {
        return $this->offsetSet(self::SHIPPING_ADDRESS, $shippingAddress);
    }
}
