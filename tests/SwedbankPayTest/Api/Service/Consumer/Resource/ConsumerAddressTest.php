<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Resource;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;

class ConsumerAddressTest extends TestCase
{
    public function testData()
    {
        $object = new ConsumerAddress();
        $this->assertInstanceOf(ConsumerAddress::class, $object->setAddressee('test'));
        $this->assertEquals('test', $object->getAddressee());

        $this->assertInstanceOf(ConsumerAddress::class, $object->setStreetAddress('test'));
        $this->assertEquals('test', $object->getStreetAddress());

        $this->assertInstanceOf(ConsumerAddress::class, $object->setCoAddress('test'));
        $this->assertEquals('test', $object->getCoAddress());

        $this->assertInstanceOf(ConsumerAddress::class, $object->setZipCode('test'));
        $this->assertEquals('test', $object->getZipCode());

        $this->assertInstanceOf(ConsumerAddress::class, $object->setCity('test'));
        $this->assertEquals('test', $object->getCity());

        $this->assertInstanceOf(ConsumerAddress::class, $object->setCountryCode('test'));
        $this->assertEquals('test', $object->getCountryCode());
    }
}