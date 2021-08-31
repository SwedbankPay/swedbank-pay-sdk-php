<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\Response\InitiateConsumerSession;

class InitiateConsumerSessionTest extends TestCase
{
    public function testData()
    {
        $object = new InitiateConsumerSession();

        $this->assertInstanceOf(InitiateConsumerSession::class, $object->setToken('test'));
        $this->assertEquals('test', $object->getToken());
    }
}