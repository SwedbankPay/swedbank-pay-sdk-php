<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Request;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Request\GetCurrentPayment;

class GetCurrentPaymentTest extends TestCase
{
    public function testData()
    {
        $object = new GetCurrentPayment();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getOperationRel());
    }
}
