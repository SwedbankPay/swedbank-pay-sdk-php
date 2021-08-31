<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentCardholder;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\CardholderAddress;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\CardholderAccountInfo;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\CardholderAccountInfoInterface;

class PaymentCardholderTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentCardholder();

        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setFirstName('test')
        );
        $this->assertEquals('test', $object->getFirstName());

        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setLastName('test')
        );
        $this->assertEquals('test', $object->getLastName());

        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setEmail('test')
        );
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setMsisdn('test')
        );
        $this->assertEquals('test', $object->getMsisdn());

        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setWorkPhoneNumber('test')
        );
        $this->assertEquals('test', $object->getWorkPhoneNumber());

        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setHomePhoneNumber('test')
        );
        $this->assertEquals('test', $object->getHomePhoneNumber());

        $address = new CardholderAddress();
        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setBillingAddress($address)
        );
        $this->assertInstanceOf(CardholderAddress::class, $object->getBillingAddress());

        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setShippingAddress($address)
        );
        $this->assertInstanceOf(CardholderAddress::class, $object->getShippingAddress());

        $info = new CardholderAccountInfo();
        $this->assertInstanceOf(
            PaymentCardholder::class,
            $object->setAccountInfo($info)
        );
        $this->assertInstanceOf(
            CardholderAccountInfoInterface::class,
            $object->getAccountInfo()
        );
    }
}