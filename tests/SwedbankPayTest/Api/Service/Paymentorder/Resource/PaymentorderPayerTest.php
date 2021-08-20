<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayer;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;

class PaymentorderPayerTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentorderPayer();

        $this->assertInstanceOf(
            PaymentorderPayer::class,
            $object->setConsumerProfileRef('test')
        );
        $this->assertEquals('test', $object->getConsumerProfileRef());

        $this->assertInstanceOf(
            PaymentorderPayer::class,
            $object->setPayerReference('test')
        );
        $this->assertEquals('test', $object->getPayerReference());

        $this->assertInstanceOf(
            PaymentorderPayer::class,
            $object->setEmail('test')
        );
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(
            PaymentorderPayer::class,
            $object->setMsisdn('test')
        );
        $this->assertEquals('test', $object->getMsisdn());

        $this->assertInstanceOf(
            PaymentorderPayer::class,
            $object->setWorkPhoneNumber('test')
        );
        $this->assertEquals('test', $object->getWorkPhoneNumber());

        $this->assertInstanceOf(
            PaymentorderPayer::class,
            $object->setHomePhoneNumber('test')
        );
        $this->assertEquals('test', $object->getHomePhoneNumber());

        $address = new ConsumerAddress();
        $this->assertInstanceOf(
            PaymentorderPayer::class,
            $object->setShippingAddress($address)
        );
        $this->assertInstanceOf(ConsumerAddress::class, $object->getShippingAddress());
    }
}