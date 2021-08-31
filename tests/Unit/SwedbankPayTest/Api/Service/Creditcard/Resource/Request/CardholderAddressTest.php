<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\CardholderAddress;

class CardholderAddressTest extends TestCase
{
    public function testData()
    {
        $object = new CardholderAddress();

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setFirstName('test')
        );
        $this->assertEquals('test', $object->getFirstName());

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setLastName('test')
        );
        $this->assertEquals('test', $object->getLastName());

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setEmail('test')
        );
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setMsisdn('test')
        );
        $this->assertEquals('test', $object->getMsisdn());

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setStreetAddress('test')
        );
        $this->assertEquals('test', $object->getStreetAddress());

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setCoAddress('test')
        );
        $this->assertEquals('test', $object->getCoAddress());

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setCity('test')
        );
        $this->assertEquals('test', $object->getCity());

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setZipCode('test')
        );
        $this->assertEquals('test', $object->getZipCode());

        $this->assertInstanceOf(
            CardholderAddress::class,
            $object->setCountryCode('test')
        );
        $this->assertEquals('test', $object->getCountryCode());
    }
}