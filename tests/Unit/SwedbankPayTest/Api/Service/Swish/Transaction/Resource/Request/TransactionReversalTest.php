<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Swish\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Swish\Transaction\Resource\Request\TransactionReversal;
use TestCase;

class TransactionReversalTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionReversal();

        $this->assertInstanceOf(
            TransactionReversal::class,
            $object->setAmount(123)
        );
        $this->assertEquals(123, $object->getAmount());

        $this->assertInstanceOf(
            TransactionReversal::class,
            $object->setVatAmount(123)
        );
        $this->assertEquals(123, $object->getVatAmount());

        $this->assertInstanceOf(
            TransactionReversal::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            TransactionReversal::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());
    }
}
