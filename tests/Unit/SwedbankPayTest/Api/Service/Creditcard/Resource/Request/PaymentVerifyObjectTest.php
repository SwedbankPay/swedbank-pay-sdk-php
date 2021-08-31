<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentVerifyObject;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentVerify;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentVerifyCreditcard;

class PaymentVerifyObjectTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentVerifyObject();

        $verify = new PaymentVerify();
        $this->assertInstanceOf(
            PaymentVerifyObject::class,
            $object->setPayment($verify)
        );
        $this->assertInstanceOf(PaymentVerify::class, $object->getPayment());

        $creditCard = new PaymentVerifyCreditcard();
        $this->assertInstanceOf(
            PaymentVerifyObject::class,
            $object->setCreditCard($creditCard)
        );
        $this->assertInstanceOf(PaymentVerifyCreditcard::class, $object->getCreditCard());
    }
}