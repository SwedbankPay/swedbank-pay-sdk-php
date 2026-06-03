<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Request;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Request\TransactionReversal;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;

class TransactionReversalTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionReversal();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertEquals('reversal', $object->getOperationRel());
        $this->assertEquals(PaymentorderResponse::class, $object->getResponseResourceFQCN());
    }
}
