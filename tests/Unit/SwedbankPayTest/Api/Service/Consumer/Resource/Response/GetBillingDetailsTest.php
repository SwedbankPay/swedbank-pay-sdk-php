<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\Response\GetBillingDetails;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;

class GetBillingDetailsTest extends TestCase
{
    public function testData()
    {
        $object = new GetBillingDetails();

        $this->assertInstanceOf(GetBillingDetails::class, $object->setEmail('test'));
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(GetBillingDetails::class, $object->setMsisdn('test'));
        $this->assertEquals('test', $object->getMsisdn());

        $this->assertInstanceOf(GetBillingDetails::class, $object->setBillingAddress(new ConsumerAddress()));
        $this->assertInstanceOf(ConsumerAddressInterface::class, $object->getBillingAddress());
    }
}