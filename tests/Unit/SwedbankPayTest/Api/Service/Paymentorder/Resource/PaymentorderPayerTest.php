<?php
// phpcs:ignoreFile -- this is test

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

    public function testMethods()
    {
        $payer = new PaymentorderPayer();

        $this->assertTrue(method_exists($payer, 'getConsumerProfileRef'));
        $this->assertTrue(method_exists($payer, 'setConsumerProfileRef'));
        $this->assertTrue(method_exists($payer, 'getPayerReference'));
        $this->assertTrue(method_exists($payer, 'setPayerReference'));
        $this->assertTrue(method_exists($payer, 'getEmail'));
        $this->assertTrue(method_exists($payer, 'setEmail'));
        $this->assertTrue(method_exists($payer, 'getMsisdn'));
        $this->assertTrue(method_exists($payer, 'setMsisdn'));
        $this->assertTrue(method_exists($payer, 'getWorkPhoneNumber'));
        $this->assertTrue(method_exists($payer, 'setWorkPhoneNumber'));
        $this->assertTrue(method_exists($payer, 'getHomePhoneNumber'));
        $this->assertTrue(method_exists($payer, 'setHomePhoneNumber'));
        $this->assertTrue(method_exists($payer, 'getShippingAddress'));
        $this->assertTrue(method_exists($payer, 'setShippingAddress'));

        $payer->setEmail('test@email.no')
            ->setMsisdn('1234567');

        $this->assertEquals('test@email.no', $payer->getEmail());
        $this->assertEquals('1234567', $payer->getMsisdn());
    }
}