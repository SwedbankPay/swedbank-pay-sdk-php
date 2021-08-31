<?php

namespace SwedbankPayTest\Api\Service\Swish\Transaction\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Swish\Transaction\Resource\Collection\SaleListCollection;
use SwedbankPay\Api\Service\Swish\Transaction\Resource\Collection\Item\SaleListItem;

class SaleListCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new SaleListCollection();
        $item = new SaleListItem();

        $this->assertInstanceOf(
            SaleListCollection::class,
            $object->addItem($item)
        );
        $this->assertEquals(1, count($object->getItems()));

        foreach ($object->getItems() as $item) {
            $this->assertInstanceOf(SaleListItem::class, $item);
        }

        $object->unsetItems();
        $this->assertEquals(0, count($object->getItems()));
    }
}
