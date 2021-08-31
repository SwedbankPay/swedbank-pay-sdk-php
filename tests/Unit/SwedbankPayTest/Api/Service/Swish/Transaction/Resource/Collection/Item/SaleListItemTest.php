<?php

namespace SwedbankPayTest\Api\Service\Swish\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Swish\Transaction\Resource\Collection\Item\SaleListItem;

class SaleListItemTest extends TestCase
{
    public function testData()
    {
        $object = new SaleListItem();

        $this->assertInstanceOf(
            SaleListItem::class,
            $object->setDate('test')
        );
        $this->assertEquals('test', $object->getDate());

        $this->assertInstanceOf(
            SaleListItem::class,
            $object->setPayerAlias('test')
        );
        $this->assertEquals('test', $object->getPayerAlias());

        $this->assertInstanceOf(
            SaleListItem::class,
            $object->setSwishPaymentReference('test')
        );
        $this->assertEquals('test', $object->getSwishPaymentReference());

        $this->assertInstanceOf(
            SaleListItem::class,
            $object->setSwishStatus('test')
        );
        $this->assertEquals('test', $object->getSwishStatus());
    }
}
