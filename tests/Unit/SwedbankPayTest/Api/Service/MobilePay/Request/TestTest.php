<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\MobilePay\Request;

use TestCase;
use SwedbankPay\Api\Service\MobilePay\Request\Test;
use SwedbankPay\Api\Client\Exception;

class TestTest extends TestCase
{
    public function testData()
    {
        // @todo Fix: SwedbankPay\Api\Client\Exception: Something is wrong with the contract.
        $this->expectException(Exception::class);

        $object = new Test(ACCESS_TOKEN_MOBILEPAY, PAYEE_ID_MOBILEPAY, true);
        $this->assertInstanceOf(Test::class, $object);
    }
}
