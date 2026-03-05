<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Client\ClientVersion;
use SwedbankPay\Api\Service\Paymentorder\Resource\ClientInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\ClientInfoInterface;

class ClientInfoTest extends TestCase
{
    public function testDefaultConstruction()
    {
        $object = new ClientInfo();

        $this->assertEquals('PHP', $object->getIntegrationSdkName());
        $this->assertNotEmpty($object->getIntegrationSdkVersion());
        $this->assertIsString($object->getIntegrationSdkVersion());
    }

    public function testIntegrationSdkNameIsImmutable()
    {
        $object = new ClientInfo();

        $this->assertFalse(method_exists($object, 'setIntegrationSdkName'));
        $this->assertEquals('PHP', $object->getIntegrationSdkName());
    }

    public function testIntegrationSdkVersionIsImmutable()
    {
        $object = new ClientInfo();

        $this->assertFalse(method_exists($object, 'setIntegrationSdkVersion'));
        $this->assertEquals(ClientVersion::version(), $object->getIntegrationSdkVersion());
    }

    public function testSettersAndGetters()
    {
        $object = new ClientInfo();

        $this->assertInstanceOf(
            ClientInfo::class,
            $object->setClientType('client')
        );
        $this->assertEquals('client', $object->getClientType());

        $this->assertInstanceOf(
            ClientInfo::class,
            $object->setPlatformName('platform')
        );
        $this->assertEquals('platform', $object->getPlatformName());

        $this->assertInstanceOf(
            ClientInfo::class,
            $object->setPresentationSdkName('presentation-sdk')
        );
        $this->assertEquals('presentation-sdk', $object->getPresentationSdkName());

        $this->assertInstanceOf(
            ClientInfo::class,
            $object->setPresentationSdkVersion('1.0.0')
        );
        $this->assertEquals('1.0.0', $object->getPresentationSdkVersion());

        $this->assertInstanceOf(
            ClientInfo::class,
            $object->setIntegrationModuleName('integration-module')
        );
        $this->assertEquals('integration-module', $object->getIntegrationModuleName());

        $this->assertInstanceOf(
            ClientInfo::class,
            $object->setIntegrationModuleVersion('2.3.4')
        );
        $this->assertEquals('2.3.4', $object->getIntegrationModuleVersion());
    }

    public function testMethods()
    {
        $object = new ClientInfo();

        $this->assertTrue(method_exists($object, 'getIntegrationSdkName'));
        $this->assertTrue(method_exists($object, 'getIntegrationSdkVersion'));
        $this->assertTrue(method_exists($object, 'getClientType'));
        $this->assertTrue(method_exists($object, 'setClientType'));
        $this->assertTrue(method_exists($object, 'getPlatformName'));
        $this->assertTrue(method_exists($object, 'setPlatformName'));
        $this->assertTrue(method_exists($object, 'getPresentationSdkName'));
        $this->assertTrue(method_exists($object, 'setPresentationSdkName'));
        $this->assertTrue(method_exists($object, 'getPresentationSdkVersion'));
        $this->assertTrue(method_exists($object, 'setPresentationSdkVersion'));
        $this->assertTrue(method_exists($object, 'getIntegrationModuleName'));
        $this->assertTrue(method_exists($object, 'setIntegrationModuleName'));
        $this->assertTrue(method_exists($object, 'getIntegrationModuleVersion'));
        $this->assertTrue(method_exists($object, 'setIntegrationModuleVersion'));
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(ClientInfoInterface::class, new ClientInfo());
    }
}
