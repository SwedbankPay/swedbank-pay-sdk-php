<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderInvoice;

class PaymentorderInvoiceTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentorderInvoice();

        $this->assertInstanceOf(
            PaymentorderInvoice::class,
            $object->setFeeAmount(125)
        );
        $this->assertEquals(125, $object->getFeeAmount());
    }
}
