<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Swish\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Swish\Transaction\Resource\Response\Sale;
use TestCase;

class SaleTest extends TestCase
{
    public function testData()
    {
        $object = new Sale();

        $this->assertInstanceOf(
            Sale::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());

        $this->assertInstanceOf(
            Sale::class,
            $object->setDate('test')
        );
        $this->assertEquals('test', $object->getDate());

        $this->assertInstanceOf(
            Sale::class,
            $object->setPaymentRequestToken('test')
        );
        $this->assertEquals('test', $object->getPaymentRequestToken());
    }
}
