<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Addressee;

class AddresseeTest extends TestCase
{
    public function testData()
    {
        $object = new Addressee();

        $this->assertInstanceOf(
            Addressee::class,
            $object->setSocialSecurityNumber('test')
        );
        $this->assertEquals('test', $object->getSocialSecurityNumber());

        $this->assertInstanceOf(
            Addressee::class,
            $object->setZipCode('test')
        );
        $this->assertEquals('test', $object->getZipCode());
    }
}