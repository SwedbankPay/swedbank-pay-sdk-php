<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Payment\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Resource\Request\PrefillInfo;

class PrefillInfoTest extends TestCase
{
    public function testData()
    {
        $object = new PrefillInfo();
        $this->assertInstanceOf(
            PrefillInfo::class,
            $object->setMsisdn('test')
        );

        $this->assertEquals('test', $object->getMsisdn());
    }
}
