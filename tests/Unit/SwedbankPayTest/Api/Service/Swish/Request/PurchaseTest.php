<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Swish\Request;

use TestCase;
use SwedbankPay\Api\Service\Swish\Request\Purchase;

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
