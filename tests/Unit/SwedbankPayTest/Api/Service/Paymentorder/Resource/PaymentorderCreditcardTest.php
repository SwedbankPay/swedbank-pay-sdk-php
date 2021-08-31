<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderCreditcard;

class PaymentorderCreditcardTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentorderCreditcard();

        $this->assertInstanceOf(
            PaymentorderCreditcard::class,
            $object->setNo3DSecureForStoredCard(true)
        );
        $this->assertEquals(true, $object->isNo3DSecureForStoredCard());

        $this->assertInstanceOf(
            PaymentorderCreditcard::class,
            $object->setRejectAuthenticationStatusU(true)
        );
        $this->assertEquals(true, $object->isRejectAuthenticationStatusU());
    }
}
