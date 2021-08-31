<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentRecurObject;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentRecur;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentRecurInterface;

class PaymentRecurObjectTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentRecurObject();
        $payment = new PaymentRecur();

        $this->assertInstanceOf(
            PaymentRecurObject::class,
            $object->setPayment($payment)
        );
        $this->assertInstanceOf(PaymentRecurInterface::class, $object->getPayment());
    }
}