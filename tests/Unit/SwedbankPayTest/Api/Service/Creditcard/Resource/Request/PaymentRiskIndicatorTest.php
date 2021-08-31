<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentRiskIndicator;

class PaymentRiskIndicatorTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentRiskIndicator();

        $this->assertInstanceOf(
            PaymentRiskIndicator::class,
            $object->setDeliveryEmailAddress('test')
        );
        $this->assertEquals('test', $object->getDeliveryEmailAddress());

        $this->assertInstanceOf(
            PaymentRiskIndicator::class,
            $object->setDeliveryTimeFrameIndicator('test')
        );
        $this->assertEquals('test', $object->getDeliveryTimeFrameIndicator());

        $this->assertInstanceOf(
            PaymentRiskIndicator::class,
            $object->setPreOrderDate('test')
        );
        $this->assertEquals('test', $object->getPreOrderDate());

        $this->assertInstanceOf(
            PaymentRiskIndicator::class,
            $object->setPreOrderPurchaseIndicator('test')
        );
        $this->assertEquals('test', $object->getPreOrderPurchaseIndicator());

        $this->assertInstanceOf(
            PaymentRiskIndicator::class,
            $object->setShipIndicator('test')
        );
        $this->assertEquals('test', $object->getShipIndicator());

        $this->assertInstanceOf(
            PaymentRiskIndicator::class,
            $object->setGiftCardPurchase(true)
        );
        $this->assertEquals(true, $object->isGiftCardPurchase());

        $this->assertInstanceOf(
            PaymentRiskIndicator::class,
            $object->setReOrderPurchaseIndicator('test')
        );
        $this->assertEquals('test', $object->getReOrderPurchaseIndicator());
    }
}