<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\Response\GetPayments;
use SwedbankPay\Api\Service\Paymentorder\Resource\Response\Data\PaymentsInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Response\Payments;

class GetPaymentsTest extends TestCase
{
    public function testData()
    {
        $object = new GetPayments();

        $this->assertInstanceOf(
            GetPayments::class,
            $object->setPaymentorder('test')
        );
        $this->assertEquals('test', $object->getPaymentorder());

        $this->assertInstanceOf(
            GetPayments::class,
            $object->setPayments(new Payments())
        );
        $this->assertInstanceOf(PaymentsInterface::class, $object->getPayments());
    }
}