<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Resource;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerNationalIdentifier;

class ConsumerNationalIdentifierTest extends TestCase
{
    public function testData()
    {
        $object = new ConsumerNationalIdentifier();

        $this->assertInstanceOf(
            ConsumerNationalIdentifier::class,
            $object->setSocialSecurityNumber('test')
        );
        $this->assertEquals('test', $object->getSocialSecurityNumber());

        $this->assertInstanceOf(
            ConsumerNationalIdentifier::class,
            $object->setCountryCode('test')
        );
        $this->assertEquals('test', $object->getCountryCode());
    }
}