<?php

namespace SwedbankPayTest\Api\Service\CreditCard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentVerifyCreditcard;

class PaymentVerifyCreditcardTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentVerifyCreditcard();

        $this->assertInstanceOf(
            PaymentVerifyCreditcard::class,
            $object->setNoCvc(true)
        );
        $this->assertEquals(true, $object->isNoCvc());
    }
}
