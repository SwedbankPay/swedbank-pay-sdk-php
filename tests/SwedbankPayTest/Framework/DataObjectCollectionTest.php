<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Framework;

use TestCase;
use SwedbankPay\Framework\DataObjectCollection;
use SwedbankPay\Framework\Data\DataObjectCollectionInterface;
use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;
use SwedbankPay\Framework\DataObjectCollectionItem;

class DataObjectCollectionTest extends TestCase
{
    public function testDataObjectCollection()
    {
        $collection = new DataObjectCollection(
            [
                ['test_a' => 123],
                ['test_b' => 123],
            ]
        );
        $this->assertInstanceOf(DataObjectCollectionInterface::class, $collection);

        $collection->addItem(['test_c' => 123]);
        $items = $collection->getItems();
        $this->assertEquals(3, count($items));

        foreach ($items as $item) {
            $this->assertInstanceOf(DataObjectCollectionItem::class, $item);
            $this->assertInstanceOf(DataObjectCollectionItemInterface::class, $item);
        }

        $collection->unsetItems();
        $this->assertEquals(0, count($collection->getItems()));

        $collection->resetItems(
            [
                ['test_a' => 123],
                ['test_b' => 124],
            ]
        );
        $this->assertEquals(2, count($collection->getItems()));

        $this->assertIsArray($collection->__toArray());

        $result = $collection->getItemsByColumnFilter('test_b', 124);
        $this->assertIsArray($result);
        $this->assertEquals(1, count($result));
        $item = array_shift($result);
        $this->assertInstanceOf(DataObjectCollectionItemInterface::class, $item);
    }
}
