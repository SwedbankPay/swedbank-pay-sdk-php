<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\TransactionListItem;

class TransactionListCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionListCollection();
        $item = new TransactionListItem();

        $this->assertInstanceOf(
            TransactionListCollection::class,
            $object->addItem($item)
        );
        $this->assertEquals(1, count($object->getItems()));

        foreach($object->getItems() as $item) {
            $this->assertInstanceOf(TransactionListItem::class, $item);
        }

        $object->unsetItems();
        $this->assertEquals(0, count($object->getItems()));
    }
}
