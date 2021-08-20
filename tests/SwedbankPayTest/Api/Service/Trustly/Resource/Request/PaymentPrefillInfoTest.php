<?php

namespace SwedbankPayTest\Api\Service\Trustly\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPrefillInfo;

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
