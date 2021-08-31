<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\TransactionCancellation;
use TestCase;

class TransactionCancellationTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionCancellation();

        $this->assertInstanceOf(
            TransactionCancellation::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            TransactionCancellation::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());
    }
}
