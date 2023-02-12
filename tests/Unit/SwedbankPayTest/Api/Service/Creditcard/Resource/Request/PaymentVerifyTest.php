<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentVerify;

class PaymentVerifyTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentVerify();

        $this->assertInstanceOf(
            PaymentVerify::class,
            $object->setPageStripdown(true)
        );
        $this->assertEquals(true, $object->isPageStripdown());

        $this->assertInstanceOf(
            PaymentVerify::class,
            $object->setGeneratePaymentToken(true)
        );
        $this->assertEquals(true, $object->isGeneratePaymentToken());

        $this->assertInstanceOf(
            PaymentVerify::class,
            $object->setGenerateRecurrenceToken(true)
        );
        $this->assertEquals(true, $object->isGenerateRecurrenceToken());

        $this->assertInstanceOf(
            PaymentVerify::class,
            $object->setGenerateUnscheduledToken(true)
        );
        $this->assertEquals(true, $object->isGenerateUnscheduledToken());
    }
}
