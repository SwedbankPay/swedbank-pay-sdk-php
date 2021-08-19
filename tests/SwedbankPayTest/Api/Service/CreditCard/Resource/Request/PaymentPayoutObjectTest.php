<?php

namespace SwedbankPayTest\Api\Service\CreditCard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPayoutObject;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentRecur;

class PaymentPayoutObjectTest extends TestCase
{
    public function testData()
    {
        $paymentObject = new PaymentPayoutObject();

        $payment = new PaymentRecur();
        $this->assertInstanceOf(
            PaymentPayoutObject::class,
            $paymentObject->setPayment($payment)
        );
        $this->assertInstanceOf(PaymentRecur::class, $paymentObject->getPayment());
    }
}