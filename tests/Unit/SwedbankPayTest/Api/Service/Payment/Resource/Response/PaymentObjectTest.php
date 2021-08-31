<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Payment\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Resource\Response\PaymentObject;
use SwedbankPay\Api\Service\Payment\Resource\Response\Payment;

class PaymentObjectTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentObject();
        $payment = new Payment();

        $this->assertInstanceOf(
            PaymentObject::class,
            $object->setPayment($payment)
        );
        $this->assertInstanceOf(Payment::class, $object->getPayment());
    }
}