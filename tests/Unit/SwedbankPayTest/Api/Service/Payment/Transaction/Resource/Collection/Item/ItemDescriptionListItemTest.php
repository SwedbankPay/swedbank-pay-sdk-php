<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\ItemDescriptionListItem;

class ItemDescriptionListItemTest extends TestCase
{
    public function testData()
    {
        $item = new ItemDescriptionListItem();

        $this->assertInstanceOf(
            ItemDescriptionListItem::class,
            $item->setAmount(123)
        );
        $this->assertEquals(123, $item->getAmount());

        $this->assertInstanceOf(
            ItemDescriptionListItem::class,
            $item->setDescription('test')
        );
        $this->assertEquals('test', $item->getDescription());
    }
}
