<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Request;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Request\TransactionCapture;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;

class TransactionCaptureTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionCapture();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertEquals('capture', $object->getOperationRel());
        $this->assertEquals(PaymentorderResponse::class, $object->getResponseResourceFQCN());
    }
}
