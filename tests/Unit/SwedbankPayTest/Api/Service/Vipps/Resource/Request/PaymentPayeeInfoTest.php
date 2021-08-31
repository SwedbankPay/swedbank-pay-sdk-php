<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Vipps\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentPayeeInfo;

class PaymentPayeeInfoTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentPayeeInfo();

        $this->assertInstanceOf(
            PaymentPayeeInfo::class,
            $object->setSubsite('test')
        );
        $this->assertEquals('test', $object->getSubsite());

        $this->assertInstanceOf(
            PaymentPayeeInfo::class,
            $object->setPayeeId('test')
        );
        $this->assertEquals('test', $object->getPayeeId());

        $this->assertInstanceOf(
            PaymentPayeeInfo::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());

        $this->assertInstanceOf(
            PaymentPayeeInfo::class,
            $object->setPayeeName('test')
        );
        $this->assertEquals('test', $object->getPayeeName());

        $this->assertInstanceOf(
            PaymentPayeeInfo::class,
            $object->setProductCategory('test')
        );
        $this->assertEquals('test', $object->getProductCategory());

        $this->assertInstanceOf(
            PaymentPayeeInfo::class,
            $object->setOrderReference('test')
        );
        $this->assertEquals('test', $object->getOrderReference());
    }


}
