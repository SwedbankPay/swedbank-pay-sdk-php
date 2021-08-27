<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Transaction;

class TransactionTest extends TestCase
{
    public function testData()
    {
        $object = new Transaction();

        $this->assertInstanceOf(
            Transaction::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setCreated('test')
        );
        $this->assertEquals('test', $object->getCreated());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setUpdated('test')
        );
        $this->assertEquals('test', $object->getUpdated());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setType('test')
        );
        $this->assertEquals('test', $object->getType());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setState('test')
        );
        $this->assertEquals('test', $object->getState());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setNumber(123)
        );
        $this->assertEquals(123, $object->getNumber());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setAmount(123)
        );
        $this->assertEquals(123, $object->getAmount());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setVatAmount(123)
        );
        $this->assertEquals(123, $object->getVatAmount());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setFailedReason('test')
        );
        $this->assertEquals('test', $object->getFailedReason());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setIsOperational(true)
        );
        $this->assertEquals(true, $object->getIsOperational());
    }
}
