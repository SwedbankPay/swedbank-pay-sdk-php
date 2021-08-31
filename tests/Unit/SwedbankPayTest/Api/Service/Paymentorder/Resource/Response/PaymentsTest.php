<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\Response\Payments;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\PaymentListCollection;

class PaymentsTest extends TestCase
{
    public function testData()
    {
        $object = new Payments();

        $this->assertInstanceOf(
            Payments::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());

        $this->assertInstanceOf(
            Payments::class,
            $object->setPaymentList(new PaymentListCollection())
        );
        $this->assertInstanceOf(PaymentListCollection::class, $object->getPaymentList());
    }
}