<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Request;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Request\UpdateOrder;

class UpdateOrderTest extends TestCase
{
    public function testData()
    {
        $object = new UpdateOrder();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getOperationRel());
        $this->assertNotNull($object->getServiceOperation());
    }
}
