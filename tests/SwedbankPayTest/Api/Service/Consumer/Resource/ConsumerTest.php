<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Resource;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\Consumer;

class ConsumerTest extends TestCase
{
    public function testData()
    {
        $object = new Consumer();
        $this->assertInstanceOf(Consumer::class, $object->setToken('test'));
        $this->assertEquals('test', $object->getToken());

        // @todo setNationalIdentifier()

        $this->assertInstanceOf(Consumer::class, $object->setFirstName('test'));
        $this->assertEquals('test', $object->getFirstName());

        $this->assertInstanceOf(Consumer::class, $object->setLastName('test'));
        $this->assertEquals('test', $object->getLastName());

        $this->assertInstanceOf(Consumer::class, $object->setEmail('test'));
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(Consumer::class, $object->setMsisdn('test'));
        $this->assertEquals('test', $object->getMsisdn());

        // @todo setLegalAddress()
        // @todo setBillingAddress()
        // @todo setShippingAddress()
    }
}