<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\ProblemsItem;

class ProblemsItemTest extends TestCase
{
    public function testData()
    {
        $item = new ProblemsItem();

        $this->assertInstanceOf(
            ProblemsItem::class,
            $item->setName('test')
        );
        $this->assertEquals('test', $item->getName());

        $this->assertInstanceOf(
            ProblemsItem::class,
            $item->setDescription('test')
        );
        $this->assertEquals('test', $item->getDescription());
    }
}
