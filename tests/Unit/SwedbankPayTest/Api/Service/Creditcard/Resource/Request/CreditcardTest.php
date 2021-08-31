<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Creditcard;

class CreditcardTest extends TestCase
{
    public function testData()
    {
        $object = new Creditcard();
        $this->assertInstanceOf(Creditcard::class, $object->setNo3DSecure(true));
        $this->assertEquals(true, $object->isNo3DSecure());

        $this->assertInstanceOf(
            Creditcard::class,
            $object->setRejectCardNot3DSecureEnrolled(true)
        );
        $this->assertEquals(true, $object->isRejectCardNot3DSecureEnrolled());

        $this->assertInstanceOf(
            Creditcard::class,
            $object->setRejectCreditCards(true)
        );
        $this->assertEquals(true, $object->isRejectCreditCards());

        $this->assertInstanceOf(
            Creditcard::class,
            $object->setRejectDebitCards(true)
        );
        $this->assertEquals(true, $object->isRejectDebitCards());

        $this->assertInstanceOf(
            Creditcard::class,
            $object->setRejectConsumerCards(true)
        );
        $this->assertEquals(true, $object->isRejectConsumerCards());

        $this->assertInstanceOf(
            Creditcard::class,
            $object->setRejectCorporateCards(true)
        );
        $this->assertEquals(true, $object->isRejectCorporateCards());

        $this->assertInstanceOf(
            Creditcard::class,
            $object->setRejectAuthenticationStatusA(true)
        );
        $this->assertEquals(true, $object->isRejectAuthenticationStatusA());
    }
}