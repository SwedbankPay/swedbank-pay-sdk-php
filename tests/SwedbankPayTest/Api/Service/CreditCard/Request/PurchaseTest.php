<?php

namespace SwedbankPayTest\Api\Service\CreditCard\Request;

use TestCase;
use SwedbankPay\Api\Service\CreditCard\Request\Purchase;

class PurchaseTest extends TestCase
{
    public function testData()
    {
        $object = new Purchase();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
    }
}
