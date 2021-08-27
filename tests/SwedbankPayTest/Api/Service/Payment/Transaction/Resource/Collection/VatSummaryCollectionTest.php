<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\VatSummaryCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\VatSummaryItem;

class VatSummaryCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new VatSummaryCollection();
        $item = new VatSummaryItem();

        $this->assertInstanceOf(
            VatSummaryCollection::class,
            $object->addItem($item)
        );
        $this->assertEquals(1, count($object->getItems()));

        foreach($object->getItems() as $item) {
            $this->assertInstanceOf(VatSummaryItem::class, $item);
        }

        $object->unsetItems();
        $this->assertEquals(0, count($object->getItems()));
    }
}
