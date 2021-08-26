<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Vipps\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Vipps\Resource\Request\VippsPaymentObject;
use SwedbankPay\Api\Service\Vipps\Resource\Request\Payment;

class VippsPaymentObjectTest extends TestCase
{
    public function testData()
    {
        $paymentObject = new VippsPaymentObject();

        $payment = new Payment();
        $this->assertInstanceOf(
            VippsPaymentObject::class,
            $paymentObject->setPayment($payment)
        );
        $this->assertInstanceOf(Payment::class, $paymentObject->getPayment());

        $this->assertInstanceOf(
            VippsPaymentObject::class,
            $paymentObject->setShoplogoUrl('test')
        );
        $this->assertEquals('test', $paymentObject->getShoplogoUrl());
    }
}