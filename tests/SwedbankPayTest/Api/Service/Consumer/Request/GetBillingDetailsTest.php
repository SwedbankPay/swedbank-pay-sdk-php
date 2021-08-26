<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Request;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Request\GetBillingDetails;

class GetBillingDetailsTest extends TestCase
{
    public function testData()
    {
        $object = new GetBillingDetails();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));

        $result = $object->setBillingDetailsUri('/test');
        $this->assertInstanceOf(GetBillingDetails::class, $result);
        $this->assertEquals('/test', $object->getBillingDetailsUri());
    }
}
