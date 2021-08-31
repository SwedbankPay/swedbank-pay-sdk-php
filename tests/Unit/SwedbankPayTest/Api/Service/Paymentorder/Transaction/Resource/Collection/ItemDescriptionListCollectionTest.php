<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\ItemDescriptionCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\DescriptionItem;

class ItemDescriptionListCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new ItemDescriptionCollection();
        $item = new DescriptionItem();

        $this->assertInstanceOf(
            ItemDescriptionCollection::class,
            $object->addItem($item)
        );
        $this->assertEquals(1, count($object->getItems()));

        foreach($object->getItems() as $item) {
            $this->assertInstanceOf(DescriptionItem::class, $item);
        }

        $object->unsetItems();
        $this->assertEquals(0, count($object->getItems()));
    }
}
