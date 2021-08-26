<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;

class PaymentorderPayeeInfoTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentorderPayeeInfo();

        $this->assertInstanceOf(
            PaymentorderPayeeInfo::class,
            $object->setSubsite('test')
        );
        $this->assertEquals('test', $object->getSubsite());

        $this->assertInstanceOf(
            PaymentorderPayeeInfo::class,
            $object->setPayeeId('test')
        );
        $this->assertEquals('test', $object->getPayeeId());

        $this->assertInstanceOf(
            PaymentorderPayeeInfo::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());

        $this->assertInstanceOf(
            PaymentorderPayeeInfo::class,
            $object->setPayeeName('test')
        );
        $this->assertEquals('test', $object->getPayeeName());

        $this->assertInstanceOf(
            PaymentorderPayeeInfo::class,
            $object->setProductCategory('test')
        );
        $this->assertEquals('test', $object->getProductCategory());

        $this->assertInstanceOf(
            PaymentorderPayeeInfo::class,
            $object->setOrderReference('test')
        );
        $this->assertEquals('test', $object->getOrderReference());
    }


}
