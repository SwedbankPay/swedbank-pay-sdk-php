<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class TransactionResourceTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionResource();

        $this->assertInstanceOf(
            TransactionResource::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());
    }
}
