<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Trustly\Request;

use TestCase;
use SwedbankPay\Api\Service\Trustly\Request\Purchase;

class PurchaseTest extends TestCase
{
    public function testData()
    {
        $object = new Purchase();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getRequestEndpoint());
        $this->assertNotNull($object->getServiceOperation());
    }
}
