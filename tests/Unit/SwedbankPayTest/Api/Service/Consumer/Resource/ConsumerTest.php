<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Resource;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\Consumer;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerNationalIdentifierInterface;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerNationalIdentifier;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;

class ConsumerTest extends TestCase
{
    public function testData()
    {
        $object = new Consumer();
        $this->assertInstanceOf(Consumer::class, $object->setToken('test'));
        $this->assertEquals('test', $object->getToken());

        $this->assertInstanceOf(Consumer::class, $object->setNationalIdentifier(new ConsumerNationalIdentifier()));
        $this->assertInstanceOf(ConsumerNationalIdentifierInterface::class, $object->getNationalIdentifier());

        $this->assertInstanceOf(Consumer::class, $object->setFirstName('test'));
        $this->assertEquals('test', $object->getFirstName());

        $this->assertInstanceOf(Consumer::class, $object->setLastName('test'));
        $this->assertEquals('test', $object->getLastName());

        $this->assertInstanceOf(Consumer::class, $object->setEmail('test'));
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(Consumer::class, $object->setMsisdn('test'));
        $this->assertEquals('test', $object->getMsisdn());

        $this->assertInstanceOf(Consumer::class, $object->setLegalAddress(new ConsumerAddress()));
        $this->assertInstanceOf(ConsumerAddressInterface::class, $object->getLegalAddress());

        $this->assertInstanceOf(Consumer::class, $object->setBillingAddress(new ConsumerAddress()));
        $this->assertInstanceOf(ConsumerAddressInterface::class, $object->getBillingAddress());

        $this->assertInstanceOf(Consumer::class, $object->setShippingAddress(new ConsumerAddress()));
        $this->assertInstanceOf(ConsumerAddressInterface::class, $object->getShippingAddress());
    }
}