<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Request\Test;

class TestTest extends TestCase
{
    public function testData()
    {
        $object = new Test(ACCESS_TOKEN, PAYEE_ID, true);
        $this->assertInstanceOf(Test::class, $object);
    }
}
