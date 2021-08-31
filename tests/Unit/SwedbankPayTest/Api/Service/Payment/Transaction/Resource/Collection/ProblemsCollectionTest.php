<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\ProblemsCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\ProblemsItem;

class ProblemsCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new ProblemsCollection();
        $item = new ProblemsItem();

        $this->assertInstanceOf(
            ProblemsCollection::class,
            $object->addItem($item)
        );
        $this->assertEquals(1, count($object->getItems()));

        foreach($object->getItems() as $item) {
            $this->assertInstanceOf(ProblemsItem::class, $item);
        }

        $object->unsetItems();
        $this->assertEquals(0, count($object->getItems()));
    }
}
