<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\Response\GetShippingDetails;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;

class GetShippingDetailsTest extends TestCase
{
    public function testData()
    {
        $object = new GetShippingDetails();

        $this->assertInstanceOf(GetShippingDetails::class, $object->setEmail('test'));
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(GetShippingDetails::class, $object->setMsisdn('test'));
        $this->assertEquals('test', $object->getMsisdn());

        $this->assertInstanceOf(GetShippingDetails::class, $object->setShippingAddress(new ConsumerAddress()));
        $this->assertInstanceOf(ConsumerAddressInterface::class, $object->getShippingAddress());
    }
}