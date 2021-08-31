<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\RemovePaymentToken;

class RemovePaymentTokenTest extends TestCase
{
    public function testData()
    {
        $object = new RemovePaymentToken();

        $this->assertInstanceOf(
            RemovePaymentToken::class,
            $object->setState('test')
        );
        $this->assertEquals('test', $object->getState());

        $this->assertInstanceOf(
            RemovePaymentToken::class,
            $object->setComment('test')
        );
        $this->assertEquals('test', $object->getComment());
    }
}