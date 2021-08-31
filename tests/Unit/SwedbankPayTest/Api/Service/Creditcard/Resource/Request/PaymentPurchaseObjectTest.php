<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseCreditcard;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseObject;

class PaymentPurchaseObjectTest extends TestCase
{
    public function testData()
    {
        $paymentObject = new PaymentPurchaseObject();

        $payment = new PaymentPurchase();
        $this->assertInstanceOf(
            PaymentPurchaseObject::class,
            $paymentObject->setPayment($payment)
        );
        $this->assertInstanceOf(PaymentPurchase::class, $paymentObject->getPayment());

        $creditCard = new PaymentPurchaseCreditcard();
        $this->assertInstanceOf(
            PaymentPurchaseObject::class,
            $paymentObject->setCreditCard($creditCard)
        );
        $this->assertInstanceOf(PaymentPurchaseCreditcard::class, $paymentObject->getCreditCard());
    }
}