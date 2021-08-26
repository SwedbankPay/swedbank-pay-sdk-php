<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Request;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Request\GetShippingDetails;

class GetShippingDetailsTest extends TestCase
{
    public function testData()
    {
        $object = new GetShippingDetails();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));

        $result = $object->setShippingDetailsUri('/test');
        $this->assertInstanceOf(GetShippingDetails::class, $result);
        $this->assertEquals('/test', $object->getShippingDetailsUri());
    }
}
