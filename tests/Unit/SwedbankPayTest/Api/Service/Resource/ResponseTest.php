<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Resource;

use TestCase;
use SwedbankPay\Api\Service\Resource\Response;
use SwedbankPay\Api\Service\Resource\Collection\OperationsCollection;

class ResponseTest extends TestCase
{
    public function testData()
    {
        $object = new Response();

        $this->assertInstanceOf(
            Response::class,
            $object->setOperations(
                []
            )
        );
        $this->assertInstanceOf(OperationsCollection::class, $object->getOperations());
    }
}
