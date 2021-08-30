<?php

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item\CaptureListItem;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class CaptureListItemTest extends TestCase
{
    public function testData()
    {
        $item = new CaptureListItem();

        $this->assertInstanceOf(
            CaptureListItem::class,
            $item->setItemDescriptions(new TransactionResource())
        );
        $this->assertInstanceOf(TransactionResourceInterface::class, $item->getItemDescriptions());

        $this->assertInstanceOf(
            CaptureListItem::class,
            $item->setInvoiceCopy('test')
        );
        $this->assertEquals('test', $item->getInvoiceCopy());
    }
}
