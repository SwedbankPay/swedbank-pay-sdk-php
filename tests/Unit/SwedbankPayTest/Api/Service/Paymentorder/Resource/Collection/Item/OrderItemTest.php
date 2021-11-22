<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\OrderItem;
//use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\Data\OrderItemInterface;

class OrderItemTest extends TestCase
{
    public function testData()
    {
        $object = new OrderItem();

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setRestrictedToInstruments(['CarPay'])
        );
        $this->assertIsArray($object->getRestrictedToInstruments());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setReference('test')
        );
        $this->assertEquals('test', $object->getReference());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setName('test')
        );
        $this->assertEquals('test', $object->getName());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setType('test')
        );
        $this->assertEquals('test', $object->getType());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setItemClass('test')
        );
        $this->assertEquals('test', $object->getItemClass());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setItemUrl('test')
        );
        $this->assertEquals('test', $object->getItemUrl());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setImageUrl('test')
        );
        $this->assertEquals('test', $object->getImageUrl());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setDiscountDescription('test')
        );
        $this->assertEquals('test', $object->getDiscountDescription());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setQuantity(123)
        );
        $this->assertEquals(123, $object->getQuantity());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setQuantityUnit('test')
        );
        $this->assertEquals('test', $object->getQuantityUnit());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setUnitPrice(123)
        );
        $this->assertEquals(123, $object->getUnitPrice());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setDiscountPrice(123)
        );
        $this->assertEquals(123, $object->getDiscountPrice());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setVatPercent(123)
        );
        $this->assertEquals(123, $object->getVatPercent());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setAmount(123)
        );
        $this->assertEquals(123, $object->getAmount());

        $this->assertInstanceOf(
            OrderItem::class,
            $object->setVatAmount(123)
        );
        $this->assertEquals(123, $object->getVatAmount());
    }
}
