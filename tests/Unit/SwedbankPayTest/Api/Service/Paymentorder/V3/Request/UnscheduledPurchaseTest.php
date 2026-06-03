<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Request;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Request\UnscheduledPurchase;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;

class UnscheduledPurchaseTest extends TestCase
{
    public function testData()
    {
        $object = new UnscheduledPurchase();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertEquals('POST', $object->getRequestMethod());
        $this->assertEquals('/psp/paymentorders', $object->getRequestEndpoint());
        $this->assertEquals('UnscheduledPurchase', $object->getServiceOperation());
        $this->assertEquals(PaymentorderResponse::class, $object->getResponseResourceFQCN());
    }
}
