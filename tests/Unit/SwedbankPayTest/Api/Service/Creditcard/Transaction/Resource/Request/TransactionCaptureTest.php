<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\TransactionCapture;
use TestCase;

class TransactionCaptureTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionCapture();

        $this->assertInstanceOf(
            TransactionCapture::class,
            $object->setAmount(123)
        );
        $this->assertEquals(123, $object->getAmount());

        $this->assertInstanceOf(
            TransactionCapture::class,
            $object->setVatAmount(123)
        );
        $this->assertEquals(123, $object->getVatAmount());

        $this->assertInstanceOf(
            TransactionCapture::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            TransactionCapture::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());
    }
}
