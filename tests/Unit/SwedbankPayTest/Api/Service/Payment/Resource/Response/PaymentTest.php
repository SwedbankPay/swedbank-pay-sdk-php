<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Payment\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Resource\Response\Payment;
use SwedbankPay\Api\Service\Payment\Resource\Request\PayeeInfo;

class PaymentTest extends TestCase
{
    public function testData()
    {
        $object = new Payment();

        $info = new PayeeInfo();

        $this->assertInstanceOf(
            Payment::class,
            $object->setPayeeInfo($info)
        );
        //$this->assertInstanceOf(Payment::class, $object->getPayeeInfo());

        $this->assertInstanceOf(
            Payment::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());

        $this->assertInstanceOf(
            Payment::class,
            $object->setNumber(1)
        );
        $this->assertEquals(1, $object->getNumber());

        $this->assertInstanceOf(
            Payment::class,
            $object->setInstrument('test')
        );
        $this->assertEquals('test', $object->getInstrument());

        $this->assertInstanceOf(
            Payment::class,
            $object->setCreated('test')
        );
        $this->assertEquals('test', $object->getCreated());

        $this->assertInstanceOf(
            Payment::class,
            $object->setUpdated('test')
        );
        $this->assertEquals('test', $object->getUpdated());

        $this->assertInstanceOf(
            Payment::class,
            $object->setOperation('test')
        );
        $this->assertEquals('test', $object->getOperation());

        $this->assertInstanceOf(
            Payment::class,
            $object->setState('test')
        );
        $this->assertEquals('test', $object->getState());

        $this->assertInstanceOf(
            Payment::class,
            $object->setAmount(1)
        );
        $this->assertEquals(1, $object->getAmount());

        $this->assertInstanceOf(
            Payment::class,
            $object->setRemainingCaptureAmount(1)
        );
        $this->assertEquals(1, $object->getRemainingCaptureAmount());

        $this->assertInstanceOf(
            Payment::class,
            $object->setRemainingCancellationAmount(1)
        );
        $this->assertEquals(1, $object->getRemainingCancellationAmount());

        $this->assertInstanceOf(
            Payment::class,
            $object->setRemainingReversalAmount(1)
        );
        $this->assertEquals(1, $object->getRemainingReversalAmount());

        $this->assertInstanceOf(
            Payment::class,
            $object->setInitiatingSystemUserAgent('test')
        );
        $this->assertEquals('test', $object->getInitiatingSystemUserAgent());

        $this->assertInstanceOf(
            Payment::class,
            $object->setPaymentToken('test')
        );
        $this->assertEquals('test', $object->getPaymentToken());

        // @todo Add methods testing
    }
}