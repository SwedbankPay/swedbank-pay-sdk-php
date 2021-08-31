<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Framework;

use TestCase;
use SwedbankPay\Framework\DataObjectCollectionItem;
use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

class DataObjectCollectionItemTest extends TestCase
{
    public function testData()
    {
        $item = new DataObjectCollectionItem(
            [
                'method1' => 123,
                'method2' => 321
            ]
        );

        $this->assertInstanceOf(DataObjectCollectionItemInterface::class, $item);
        $this->assertTrue($item->__isset('method1'));
        $this->assertTrue($item->offsetExists('method1'));
        $this->assertEquals(123, $item->getMethod1());
        $this->assertEquals(123, $item->__get('method1'));
        $this->assertEquals(123, $item->offsetGet('method1'));

        $item->__set('method3', 222);
        $this->assertEquals(222, $item->__get('method3'));
        $item->offsetSet('method3', 333);
        $this->assertEquals(333, $item->__get('method3'));

        $item->offsetUnset('method3');
        $this->assertFalse($item->offsetExists('method3'));

        $this->assertIsArray($item->__toArray());
    }
}