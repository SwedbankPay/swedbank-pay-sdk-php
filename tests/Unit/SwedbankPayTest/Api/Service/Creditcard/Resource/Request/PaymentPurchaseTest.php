<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchase;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentCardholder;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentRiskIndicator;

class PaymentPurchaseTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentPurchase();

        $price = new PriceItem();
        $price->setType('Creditcard')
            ->setAmount(1500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setPrices($prices)
        );
        $this->assertInstanceOf(PricesCollection::class, $object->getPrices());

        $cardHolder = new PaymentCardholder();
        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setCardholder($cardHolder)
        );
        $this->assertInstanceOf(PaymentCardholder::class, $object->getCardholder());

        $riskIndicator = new PaymentRiskIndicator();
        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setRiskIndicator($riskIndicator)
        );
        $this->assertInstanceOf(PaymentRiskIndicator::class, $object->getRiskIndicator());

        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setPaymentToken('test')
        );
        $this->assertEquals('test', $object->getPaymentToken());

        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setGeneratePaymentToken(true)
        );
        $this->assertEquals(true, $object->isGeneratePaymentToken());

        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setRecurrenceToken('test')
        );
        $this->assertEquals('test', $object->getRecurrenceToken());

        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setGenerateRecurrenceToken(true)
        );
        $this->assertEquals(true, $object->isGenerateRecurrenceToken());

        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setUnscheduledToken('test')
        );
        $this->assertEquals('test', $object->getUnscheduledToken());

        $this->assertInstanceOf(
            PaymentPurchase::class,
            $object->setGenerateUnscheduledToken(true)
        );
        $this->assertEquals(true, $object->isGenerateUnscheduledToken());
    }
}
