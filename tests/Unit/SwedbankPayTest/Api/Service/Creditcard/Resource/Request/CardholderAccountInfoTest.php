<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\CardholderAccountInfo;

class CardholderAccountInfoTest extends TestCase
{
    public function testData()
    {
        $object = new CardholderAccountInfo();

        $this->assertInstanceOf(
            CardholderAccountInfo::class,
            $object->setAccountAgeIndicator('test')
        );
        $this->assertEquals('test', $object->getAccountAgeIndicator());

        $this->assertInstanceOf(
            CardholderAccountInfo::class,
            $object->setAccountChangeIndicator('test')
        );
        $this->assertEquals('test', $object->getAccountChangeIndicator());

        $this->assertInstanceOf(
            CardholderAccountInfo::class,
            $object->setAccountPwdChangeIndicator('test')
        );
        $this->assertEquals('test', $object->getAccountPwdChangeIndicator());

        $this->assertInstanceOf(
            CardholderAccountInfo::class,
            $object->setShippingAddressUsageIndicator('test')
        );
        $this->assertEquals('test', $object->getShippingAddressUsageIndicator());

        $this->assertInstanceOf(
            CardholderAccountInfo::class,
            $object->setShippingNameIndicator('test')
        );
        $this->assertEquals('test', $object->getShippingNameIndicator());

        $this->assertInstanceOf(
            CardholderAccountInfo::class,
            $object->setSuspiciousAccountActivity('test')
        );
        $this->assertEquals('test', $object->getSuspiciousAccountActivity());

        $this->assertInstanceOf(
            CardholderAccountInfo::class,
            $object->setAddressMatchIndicator('test')
        );
        $this->assertEquals('test', $object->getAddressMatchIndicator());
    }
}