<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Consumer;
use TestCase;

class ConsumerTest extends TestCase
{
    public function testData()
    {
        $object = new Consumer();

        $this->assertInstanceOf(
            Consumer::class,
            $object->setSocialSecurityNumber('test')
        );
        $this->assertEquals('test', $object->getSocialSecurityNumber());

        $this->assertInstanceOf(
            Consumer::class,
            $object->setCustomerNumber('test')
        );
        $this->assertEquals('test', $object->getCustomerNumber());

        $this->assertInstanceOf(
            Consumer::class,
            $object->setName('test')
        );
        $this->assertEquals('test', $object->getName());

        $this->assertInstanceOf(
            Consumer::class,
            $object->setEmail('test')
        );
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(
            Consumer::class,
            $object->setMsisdn('test')
        );
        $this->assertEquals('test', $object->getMsisdn());

        $this->assertInstanceOf(
            Consumer::class,
            $object->setIp('test')
        );
        $this->assertEquals('test', $object->getIp());
    }
}
