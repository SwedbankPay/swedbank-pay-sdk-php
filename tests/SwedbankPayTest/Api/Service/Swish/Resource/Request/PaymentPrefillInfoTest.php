<?php

namespace SwedbankPayTest\Api\Service\Swish\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentPrefillInfo;

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
