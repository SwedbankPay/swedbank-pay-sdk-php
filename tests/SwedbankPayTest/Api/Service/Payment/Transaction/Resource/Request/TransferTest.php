<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Transfer;

class TransferTest extends TestCase
{
    public function testData()
    {
        $object = new Transfer();

        $this->assertInstanceOf(
            Transfer::class,
            $object->setAmount(123)
        );
        $this->assertEquals(123, $object->getAmount());

        $this->assertInstanceOf(
            Transfer::class,
            $object->setVatAmount(123)
        );
        $this->assertEquals(123, $object->getVatAmount());

        $this->assertInstanceOf(
            Transfer::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            Transfer::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());
    }
}
