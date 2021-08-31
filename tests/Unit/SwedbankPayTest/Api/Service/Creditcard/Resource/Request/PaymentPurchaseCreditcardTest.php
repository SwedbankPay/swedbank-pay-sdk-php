<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseCreditcard;

class PaymentPurchaseCreditcardTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentPurchaseCreditcard();
        $this->assertInstanceOf(
            PaymentPurchaseCreditcard::class,
            $object->setMailOrderTelephoneOrder(true)
        );
        $this->assertEquals(true, $object->isMailOrderTelephoneOrder());

        $this->assertInstanceOf(
            PaymentPurchaseCreditcard::class,
            $object->setRejectAuthenticationStatusU(true)
        );
        $this->assertEquals(true, $object->isRejectAuthenticationStatusU());
    }
}