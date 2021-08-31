<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Request\GetPayment;

class GetPaymentTest extends TestCase
{
    public function testData()
    {
        $object = new GetPayment();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getResponseResourceFQCN());
    }
}
