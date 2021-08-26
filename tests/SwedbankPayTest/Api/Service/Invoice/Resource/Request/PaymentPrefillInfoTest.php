<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentPrefillInfo;

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