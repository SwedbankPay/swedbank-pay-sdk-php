<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Payment\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Resource\Request\PayeeInfo;

class PayeeInfoTest extends TestCase
{
    public function testData()
    {
        $object = new PayeeInfo();

        $this->assertInstanceOf(
            PayeeInfo::class,
            $object->setSubsite('test')
        );
        $this->assertEquals('test', $object->getSubsite());

        $this->assertInstanceOf(
            PayeeInfo::class,
            $object->setPayeeId('test')
        );
        $this->assertEquals('test', $object->getPayeeId());

        $this->assertInstanceOf(
            PayeeInfo::class,
            $object->setPayeeReference('test')
        );
        $this->assertEquals('test', $object->getPayeeReference());

        $this->assertInstanceOf(
            PayeeInfo::class,
            $object->setPayeeName('test')
        );
        $this->assertEquals('test', $object->getPayeeName());

        $this->assertInstanceOf(
            PayeeInfo::class,
            $object->setProductCategory('test')
        );
        $this->assertEquals('test', $object->getProductCategory());

        $this->assertInstanceOf(
            PayeeInfo::class,
            $object->setOrderReference('test')
        );
        $this->assertEquals('test', $object->getOrderReference());
    }


}
