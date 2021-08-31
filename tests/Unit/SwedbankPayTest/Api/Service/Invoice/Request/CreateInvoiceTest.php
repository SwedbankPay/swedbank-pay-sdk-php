<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Request\CreateInvoice;

class CreateInvoiceTest extends TestCase
{
    public function testData()
    {
        $object = new CreateInvoice();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getRequestEndpoint());
        $this->assertNotNull($object->getServiceOperation());
    }
}
