<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\Item\FinancialTransaction;

class FinancialTransactionTest extends TestCase
{
    public function testData()
    {
        $object = new FinancialTransaction();

        $this->assertInstanceOf(FinancialTransaction::class, $object->setId('/psp/paymentorders/abc/financialtransactions/uuid'));
        $this->assertEquals('/psp/paymentorders/abc/financialtransactions/uuid', $object->getId());

        $this->assertNull($object->getCreated());
        $this->assertNull($object->getUpdated());
        $this->assertNull($object->getType());
        $this->assertNull($object->getNumber());
        $this->assertNull($object->getAmount());
        $this->assertNull($object->getVatAmount());
        $this->assertNull($object->getDescription());
        $this->assertNull($object->getPayeeReference());
        $this->assertNull($object->getOrderItems());
    }

    public function testReadsValuesFromConstructor()
    {
        // Collection items are built by FinancialTransactionsListCollection via the factory
        // path, which passes the decoded + snake-cased array — not a JSON string. Mirror that.
        $object = new FinancialTransaction([
            'id'              => '/psp/paymentorders/abc/financialtransactions/uuid',
            'type'            => 'Capture',
            'number'          => 40128372069,
            'amount'          => 100,
            'vat_amount'      => 0,
            'description'     => 'Capturing the authorized payment',
            'payee_reference' => '1702044467',
        ]);

        $this->assertEquals('Capture', $object->getType());
        $this->assertEquals(40128372069, $object->getNumber());
        $this->assertEquals(100, $object->getAmount());
        $this->assertEquals(0, $object->getVatAmount());
        $this->assertEquals('Capturing the authorized payment', $object->getDescription());
        $this->assertEquals('1702044467', $object->getPayeeReference());
    }
}
