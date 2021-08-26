<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Trustly\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPrefillInfo;

class PaymentPrefillInfoTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentPrefillInfo();
        $this->assertInstanceOf(
            PaymentPrefillInfo::class,
            $object->setMsisdn('test')
        );

        $this->assertEquals('test', $object->getMsisdn());
    }

    public function testPaymentPrefillInfo()
    {
        $prefillInfo = new PaymentPrefillInfo();

        $this->assertTrue(method_exists($prefillInfo, 'setFirstName'));
        $this->assertTrue(method_exists($prefillInfo, 'getFirstName'));
        $this->assertTrue(method_exists($prefillInfo, 'setLastName'));
        $this->assertTrue(method_exists($prefillInfo, 'getLastName'));

        $prefillInfo->setFirstName('Ola')
            ->setLastName('Nordmann');

        $this->assertEquals('Ola', $prefillInfo->getFirstName());
        $this->assertEquals('Nordmann', $prefillInfo->getLastName());
    }
}
