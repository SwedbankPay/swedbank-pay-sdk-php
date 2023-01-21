<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentRecur;

class PaymentRecurTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentRecur();

        $this->assertInstanceOf(
            PaymentRecur::class,
            $object->setPaymentToken('test')
        );
        $this->assertEquals('test', $object->getPaymentToken());

        $this->assertInstanceOf(
            PaymentRecur::class,
            $object->setRecurrenceToken('test')
        );
        $this->assertEquals('test', $object->getRecurrenceToken());

        $this->assertInstanceOf(
            PaymentRecur::class,
            $object->setUnscheduledToken('test')
        );
        $this->assertEquals('test', $object->getUnscheduledToken());

        $this->assertInstanceOf(
            PaymentRecur::class,
            $object->setAmount(123)
        );
        $this->assertEquals(123, $object->getAmount());

        $this->assertInstanceOf(
            PaymentRecur::class,
            $object->setVatAmount(123)
        );
        $this->assertEquals(123, $object->getVatAmount());
    }
}