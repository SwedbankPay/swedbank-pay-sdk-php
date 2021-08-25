<?php

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPrefillInfo;

class PaymentPrefillInfoTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentPrefillInfo();
        $this->assertInstanceOf(
            PaymentPrefillInfo::class,
            $object->setMsisdn('test')
        );

        $this->assertEquals('test', $object->getMsisdn());
    }
}