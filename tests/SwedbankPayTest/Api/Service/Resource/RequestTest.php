<?php

namespace SwedbankPayTest\Api\Service\Resource;

use TestCase;
use SwedbankPay\Api\Service\Resource\Request;

class RequestTest extends TestCase
{
    public function testData()
    {
        $object = new Request();

        $this->assertInstanceOf(
            Request::class,
            $object->setOperation('test')
        );
        $this->assertEquals('test', $object->getOperation());
    }
}
