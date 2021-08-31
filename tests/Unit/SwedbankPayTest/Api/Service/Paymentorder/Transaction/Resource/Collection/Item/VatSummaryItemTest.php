<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\VatSummaryItem;

class VatSummaryItemTest extends TestCase
{
    public function testData()
    {
        $item = new VatSummaryItem();

        $this->assertInstanceOf(
            VatSummaryItem::class,
            $item->setAmount(123)
        );
        $this->assertEquals(123, $item->getAmount());

        $this->assertInstanceOf(
            VatSummaryItem::class,
            $item->setVatPercent(123)
        );
        $this->assertEquals(123, $item->getVatPercent());

        $this->assertInstanceOf(
            VatSummaryItem::class,
            $item->setVatAmount(123)
        );
        $this->assertEquals(123, $item->getVatAmount());
    }
}
