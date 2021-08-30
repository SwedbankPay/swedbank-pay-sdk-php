<?php

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\CaptureListCollection;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item\CaptureListItem;

class CaptureListCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new CaptureListCollection();
        $item = new CaptureListItem();

        $this->assertInstanceOf(
            CaptureListCollection::class,
            $object->addItem($item)
        );
        $this->assertEquals(1, count($object->getItems()));

        foreach ($object->getItems() as $item) {
            $this->assertInstanceOf(CaptureListItem::class, $item);
        }

        $object->unsetItems();
        $this->assertEquals(0, count($object->getItems()));
    }
}
