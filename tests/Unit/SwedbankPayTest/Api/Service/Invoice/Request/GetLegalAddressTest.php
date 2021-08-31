<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Request\GetLegalAddress;

class GetLegalAddressTest extends TestCase
{
    public function testData()
    {
        $object = new GetLegalAddress();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
    }
}
