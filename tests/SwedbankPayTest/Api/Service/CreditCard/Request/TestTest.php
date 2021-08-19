<?php

namespace SwedbankPayTest\Api\Service\CreditCard\Request;

use TestCase;
use SwedbankPay\Api\Service\CreditCard\Request\Test;

class TestTest extends TestCase
{
    public function testData()
    {
        $object = new Test(ACCESS_TOKEN, PAYEE_ID, true);
        $this->assertInstanceOf(Test::class, $object);
    }
}
