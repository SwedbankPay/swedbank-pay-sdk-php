<?php

namespace SwedbankPayTest\Api\Service\Creditcard\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Request\GetPayment;

class GetPaymentTest extends TestCase
{
    public function testData()
    {
        $object = new GetPayment();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());
    }
}