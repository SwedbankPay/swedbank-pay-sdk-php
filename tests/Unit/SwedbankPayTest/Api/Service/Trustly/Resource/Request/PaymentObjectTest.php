<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Trustly\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentObject;
use SwedbankPay\Api\Service\Trustly\Resource\Request\Payment;

class PaymentObjectTest extends TestCase
{
    public function testData()
    {
        $paymentObject = new PaymentObject();

        $payment = new Payment();
        $this->assertInstanceOf(
            PaymentObject::class,
            $paymentObject->setPayment($payment)
        );
        $this->assertInstanceOf(Payment::class, $paymentObject->getPayment());
    }
}