<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Invoice;

class InvoiceTest extends TestCase
{
    public function testData()
    {
        $object = new Invoice();

        $this->assertInstanceOf(
            Invoice::class,
            $object->setInvoiceType('test')
        );
        $this->assertEquals('test', $object->getInvoiceType());
    }
}