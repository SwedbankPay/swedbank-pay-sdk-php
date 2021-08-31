<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Transaction\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Transaction\Request\CreateVerification;

class CreateVerificationTest extends TestCase
{
    public function testData()
    {
        $object = new CreateVerification();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getOperationRel());
        $this->assertNotNull($object->getResponseResourceFQCN());
    }
}