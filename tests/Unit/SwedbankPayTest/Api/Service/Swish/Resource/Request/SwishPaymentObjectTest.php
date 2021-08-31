<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Swish\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Swish\Resource\Request\SwishPaymentObject;
use SwedbankPay\Api\Service\Swish\Resource\Request\Payment;

class SwishPaymentObjectTest extends TestCase
{
    public function testData()
    {
        $paymentObject = new SwishPaymentObject();

        $payment = new Payment();
        $this->assertInstanceOf(
            SwishPaymentObject::class,
            $paymentObject->setPayment($payment)
        );
        $this->assertInstanceOf(Payment::class, $paymentObject->getPayment());

        $this->assertInstanceOf(
            SwishPaymentObject::class,
            $paymentObject->setShoplogoUrl('test')
        );
        $this->assertEquals('test', $paymentObject->getShoplogoUrl());
    }
}