<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request\Transaction;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\ItemDescriptionCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\VatSummaryCollection;

class TransactionTest extends TestCase
{
    public function testData()
    {
        $object = new Transaction();

        $this->assertInstanceOf(
            Transaction::class,
            $object->setOrderItems(new OrderItemsCollection())
        );
        $this->assertInstanceOf(OrderItemsCollection::class, $object->getOrderItems());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setItemDescriptions(new ItemDescriptionCollection())
        );
        $this->assertInstanceOf(ItemDescriptionCollection::class, $object->getItemDescriptions());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setVatSummary(new VatSummaryCollection())
        );
        $this->assertInstanceOf(VatSummaryCollection::class, $object->getVatSummary());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setAmount(123)
        );
        $this->assertEquals(123, $object->getAmount());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setVatAmount(123)
        );
        $this->assertEquals(123, $object->getVatAmount());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());

        $this->assertInstanceOf(
            Transaction::class,
            $object->setReceiptReference('test')
        );
        $this->assertEquals('test', $object->getReceiptReference());
    }
}
