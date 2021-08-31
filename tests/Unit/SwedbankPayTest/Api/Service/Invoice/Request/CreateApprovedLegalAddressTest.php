<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Request\CreateApprovedLegalAddress;

class CreateApprovedLegalAddressTest extends TestCase
{
    public function testData()
    {
        $object = new CreateApprovedLegalAddress();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getOperationRel());
    }
}
