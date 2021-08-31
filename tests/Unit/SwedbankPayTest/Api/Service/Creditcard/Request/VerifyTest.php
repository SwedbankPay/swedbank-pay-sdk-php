<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Request\Verify;

class VerifyTest extends TestCase
{
    public function testData()
    {
        $object = new Verify();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getRequestEndpoint());
        $this->assertNotNull($object->getServiceOperation());
    }
}
