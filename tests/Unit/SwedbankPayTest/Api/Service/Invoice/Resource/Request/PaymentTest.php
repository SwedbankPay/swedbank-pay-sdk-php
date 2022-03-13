<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Payment;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;

class PaymentTest extends TestCase
{
    public function testData()
    {
        $object = new Payment();
        $prices = new PricesCollection();

        $this->assertInstanceOf(
            Payment::class,
            $object->setPrices($prices)
        );
        $this->assertInstanceOf(PricesCollection::class, $object->getPrices());

        $this->assertInstanceOf(
            Payment::class,
            $object->setCurrency('test')
        );
        $this->assertEquals('test', $object->getCurrency());

        $this->assertInstanceOf(
            Payment::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            Payment::class,
            $object->setUserAgent('test')
        );
        $this->assertEquals('test', $object->getUserAgent());

        $this->assertInstanceOf(
            Payment::class,
            $object->setLanguage('test')
        );
        $this->assertEquals('test', $object->getLanguage());

        $this->assertInstanceOf(
            Payment::class,
            $object->setIntent('test')
        );
        $this->assertEquals('test', $object->getIntent());

        $this->assertInstanceOf(
            Payment::class,
            $object->setPayerReference('test')
        );
        $this->assertEquals('test', $object->getPayerReference());
    }
}