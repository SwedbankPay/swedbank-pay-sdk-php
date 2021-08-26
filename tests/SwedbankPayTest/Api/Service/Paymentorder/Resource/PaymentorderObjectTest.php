<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Data\PaymentorderInterface;

class PaymentorderObjectTest extends TestCase
{
    public function testData()
    {
        $paymentObject = new PaymentorderObject();

        $paymentOrder = new Paymentorder();
        $this->assertInstanceOf(
            PaymentorderObject::class,
            $paymentObject->setPaymentorder($paymentOrder)
        );
        $this->assertInstanceOf(
            PaymentorderInterface::class,
            $paymentObject->getPaymentorder()
        );
    }
}