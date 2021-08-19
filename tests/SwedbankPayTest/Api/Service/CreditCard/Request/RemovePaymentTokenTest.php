<?php

namespace SwedbankPayTest\Api\Service\CreditCard\Request;

use TestCase;
use SwedbankPay\Api\Service\CreditCard\Request\RemovePaymentToken;

class RemovePaymentTokenTest extends TestCase
{
    public function testData()
    {
        $object = new RemovePaymentToken();
        $object->setClient($this->client);

        $this->assertInstanceOf(
            RemovePaymentToken::class,
            $object->setInstrumentDataUri('/test')
        );
        $this->assertEquals('/test', $object->getInstrumentDataUri());

        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getRequestEndpoint());

    }
}
