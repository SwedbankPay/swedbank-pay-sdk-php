<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Request;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Request\UpdateOrder;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;

class UpdateOrderTest extends TestCase
{
    public function testData()
    {
        $object = new UpdateOrder();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertEquals('update-paymentorder-updateorder', $object->getOperationRel());
        $this->assertEquals('UpdateOrder', $object->getServiceOperation());
        $this->assertEquals(PaymentorderResponse::class, $object->getResponseResourceFQCN());
    }
}
