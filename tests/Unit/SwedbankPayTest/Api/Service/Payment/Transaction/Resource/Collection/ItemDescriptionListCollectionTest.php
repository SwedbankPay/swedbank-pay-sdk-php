<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\ItemDescriptionListCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\ItemDescriptionListItem;

class ItemDescriptionListCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new ItemDescriptionListCollection();
        $item = new ItemDescriptionListItem();

        $this->assertInstanceOf(
            ItemDescriptionListCollection::class,
            $object->addItem($item)
        );
        $this->assertEquals(1, count($object->getItems()));

        foreach($object->getItems() as $item) {
            $this->assertInstanceOf(ItemDescriptionListItem::class, $item);
        }

        $object->unsetItems();
        $this->assertEquals(0, count($object->getItems()));
    }
}
