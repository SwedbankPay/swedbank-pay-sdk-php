<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Resource\Collection\Item\OperationsItem;

class OperationsItemTest extends TestCase
{
    public function testData()
    {
        $object = new OperationsItem();

        $this->assertInstanceOf(
            OperationsItem::class,
            $object->setMethod('test')
        );
        $this->assertEquals('test', $object->getMethod());

        $this->assertInstanceOf(
            OperationsItem::class,
            $object->setRel('test')
        );
        $this->assertEquals('test', $object->getRel());

        $this->assertInstanceOf(
            OperationsItem::class,
            $object->setHref('test')
        );
        $this->assertEquals('test', $object->getHref());

        $this->assertInstanceOf(
            OperationsItem::class,
            $object->setContentType('test')
        );
        $this->assertEquals('test', $object->getContentType());
    }
}
