<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Resource\Request\InvoicePaymentObject;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Invoice;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\InvoiceInterface;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Payment;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\PaymentInterface;

class InvoicePaymentObjectTest extends TestCase
{
    public function testData()
    {
        $object = new InvoicePaymentObject();

        $invoice = new Invoice();
        $this->assertInstanceOf(
            InvoicePaymentObject::class,
            $object->setInvoice($invoice)
        );
        $this->assertInstanceOf(InvoiceInterface::class, $object->getInvoice());

        $payment = new Payment();
        $this->assertInstanceOf(
            InvoicePaymentObject::class,
            $object->setPayment($payment)
        );
        $this->assertInstanceOf(PaymentInterface::class, $object->getPayment());
    }
}