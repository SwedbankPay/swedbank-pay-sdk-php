<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Swish\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentSwish;

class PaymentSwishTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentSwish();

        $this->assertInstanceOf(
            PaymentSwish::class,
            $object->setEcomOnlyEnabled(true)
        );
        $this->assertEquals(true, $object->isEcomOnlyEnabled());
    }
}
