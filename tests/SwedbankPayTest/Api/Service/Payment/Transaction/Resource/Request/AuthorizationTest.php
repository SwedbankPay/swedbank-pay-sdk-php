<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Authorization;

class AuthorizationTest extends TestCase
{
    public function testData()
    {
        $object = new Authorization();

        $this->assertInstanceOf(
            Authorization::class,
            $object->setMsisdn('test')
        );
        $this->assertEquals('test', $object->getMsisdn());
    }
}
