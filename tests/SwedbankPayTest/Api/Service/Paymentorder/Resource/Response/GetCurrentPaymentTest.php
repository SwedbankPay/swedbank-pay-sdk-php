<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\Response\GetCurrentPayment;
use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentResponseInterface;
use SwedbankPay\Api\Service\Payment\Resource\Response\Payment;

class GetCurrentPaymentTest extends TestCase
{
    public function testData()
    {
        $object = new GetCurrentPayment();

        $this->assertInstanceOf(
            GetCurrentPayment::class,
            $object->setPaymentorder('test')
        );
        $this->assertEquals('test', $object->getPaymentorder());

        $this->assertInstanceOf(
            GetCurrentPayment::class,
            $object->setElementMenuName('test')
        );
        $this->assertEquals('test', $object->getElementMenuName());

        $this->assertInstanceOf(
            GetCurrentPayment::class,
            $object->setPayment(new Payment())
        );
        $this->assertInstanceOf(PaymentResponseInterface::class, $object->getPayment());
    }
}