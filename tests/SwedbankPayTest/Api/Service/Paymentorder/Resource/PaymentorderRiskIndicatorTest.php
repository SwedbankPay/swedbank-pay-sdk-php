<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderRiskIndicator;

class PaymentorderRiskIndicatorTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentorderRiskIndicator();

        $this->assertInstanceOf(
            PaymentorderRiskIndicator::class,
            $object->setDeliveryEmailAddress('test')
        );
        $this->assertEquals('test', $object->getDeliveryEmailAddress());

        $this->assertInstanceOf(
            PaymentorderRiskIndicator::class,
            $object->setDeliveryTimeFrameIndicator('test')
        );
        $this->assertEquals('test', $object->getDeliveryTimeFrameIndicator());

        $this->assertInstanceOf(
            PaymentorderRiskIndicator::class,
            $object->setPreOrderDate('test')
        );
        $this->assertEquals('test', $object->getPreOrderDate());

        $this->assertInstanceOf(
            PaymentorderRiskIndicator::class,
            $object->setPreOrderPurchaseIndicator('test')
        );
        $this->assertEquals('test', $object->getPreOrderPurchaseIndicator());

        $this->assertInstanceOf(
            PaymentorderRiskIndicator::class,
            $object->setShipIndicator('test')
        );
        $this->assertEquals('test', $object->getShipIndicator());

        $this->assertInstanceOf(
            PaymentorderRiskIndicator::class,
            $object->setGiftCardPurchase(true)
        );
        $this->assertEquals(true, $object->isGiftCardPurchase());

        $this->assertInstanceOf(
            PaymentorderRiskIndicator::class,
            $object->setReOrderPurchaseIndicator('test')
        );
        $this->assertEquals('test', $object->getReOrderPurchaseIndicator());
    }
}