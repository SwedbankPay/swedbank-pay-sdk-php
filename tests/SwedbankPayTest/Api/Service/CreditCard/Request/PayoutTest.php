<?php

namespace SwedbankPayTest\Api\Service\CreditCard\Request;

use TestCase;
use SwedbankPay\Api\Service\CreditCard\Request\Payout;

class PayoutTest extends TestCase
{
    public function testData()
    {
        $object = new Payout();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getRequestEndpoint());
        $this->assertNotNull($object->getServiceOperation());
    }
}