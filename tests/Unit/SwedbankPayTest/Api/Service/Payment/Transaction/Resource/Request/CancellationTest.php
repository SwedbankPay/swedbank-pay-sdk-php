<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Cancellation;

class CancellationTest extends TestCase
{
    public function testData()
    {
        $object = new Cancellation();

        $this->assertInstanceOf(
            Cancellation::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            Cancellation::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());
    }
}
