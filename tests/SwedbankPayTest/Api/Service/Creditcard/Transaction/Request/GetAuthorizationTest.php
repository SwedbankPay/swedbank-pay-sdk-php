<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Transaction\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Transaction\Request\GetAuthorization;

class GetAuthorizationTest extends TestCase
{
    public function testData()
    {
        $object = new GetAuthorization();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getResponseResourceFQCN());
    }
}