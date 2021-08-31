<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\DescriptionItem;

class DescriptionItemTest extends TestCase
{
    public function testData()
    {
        $item = new DescriptionItem();

        $this->assertInstanceOf(
            DescriptionItem::class,
            $item->setAmount(123)
        );
        $this->assertEquals(123, $item->getAmount());

        $this->assertInstanceOf(
            DescriptionItem::class,
            $item->setDescription('test')
        );
        $this->assertEquals('test', $item->getDescription());
    }
}
