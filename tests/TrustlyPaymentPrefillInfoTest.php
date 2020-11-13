<?php

use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPrefillInfo;

class TrustlyPaymentPrefillInfoTest extends TestCase
{
    public function testExceptionUndefinedEnvironment()
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
