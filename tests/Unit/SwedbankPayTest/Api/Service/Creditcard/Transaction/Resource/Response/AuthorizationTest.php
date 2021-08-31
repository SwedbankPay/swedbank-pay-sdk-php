<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Authorization;
use TestCase;

class AuthorizationTest extends TestCase
{
    public function testData()
    {
        $object = new Authorization();

        $this->assertInstanceOf(Authorization::class, $object->setDirect('test'));
        $this->assertEquals('test', $object->getDirect());

        $this->assertInstanceOf(Authorization::class, $object->setPaymentToken('test'));
        $this->assertEquals('test', $object->getPaymentToken());

        $this->assertInstanceOf(Authorization::class, $object->setRecurrenceToken('test'));
        $this->assertEquals('test', $object->getRecurrenceToken());

        $this->assertInstanceOf(Authorization::class, $object->setMaskedPan('test'));
        $this->assertEquals('test', $object->getMaskedPan());

        $this->assertInstanceOf(Authorization::class, $object->setExpiryDate('test'));
        $this->assertEquals('test', $object->getExpiryDate());

        $this->assertInstanceOf(Authorization::class, $object->setPanToken('test'));
        $this->assertEquals('test', $object->getPanToken());

        $this->assertInstanceOf(Authorization::class, $object->setCardBrand('test'));
        $this->assertEquals('test', $object->getCardBrand());

        $this->assertInstanceOf(Authorization::class, $object->setCardType('test'));
        $this->assertEquals('test', $object->getCardType());

        $this->assertInstanceOf(Authorization::class, $object->setIssuingBank('test'));
        $this->assertEquals('test', $object->getIssuingBank());

        $this->assertInstanceOf(Authorization::class, $object->setCountryCode('test'));
        $this->assertEquals('test', $object->getCountryCode());

        $this->assertInstanceOf(
            Authorization::class,
            $object->setAcquirerTransactionType('test')
        );
        $this->assertEquals('test', $object->getAcquirerTransactionType());

        $this->assertInstanceOf(
            Authorization::class,
            $object->setIssuerAuthorizationApprovalCode('test')
        );
        $this->assertEquals('test', $object->getIssuerAuthorizationApprovalCode());

        $this->assertInstanceOf(Authorization::class, $object->setAcquirerStan('test'));
        $this->assertEquals('test', $object->getAcquirerStan());

        $this->assertInstanceOf(Authorization::class, $object->setAcquirerTerminalId('test'));
        $this->assertEquals('test', $object->getAcquirerTerminalId());

        $this->assertInstanceOf(
            Authorization::class,
            $object->setAcquirerTransactionTime('test')
        );
        $this->assertEquals('test', $object->getAcquirerTransactionTime());

        $this->assertInstanceOf(
            Authorization::class,
            $object->setAuthenticationStatus('test')
        );
        $this->assertEquals('test', $object->getAuthenticationStatus());

        $this->assertInstanceOf(Authorization::class, $object->setNonPaymentToken('test'));
        $this->assertEquals('test', $object->getNonPaymentToken());

        $this->assertInstanceOf(
            Authorization::class,
            $object->setExternalNonPaymentToken('test')
        );
        $this->assertEquals('test', $object->getExternalNonPaymentToken());

        $this->assertInstanceOf(Authorization::class, $object->setExternalSiteId('test'));
        $this->assertEquals('test', $object->getExternalSiteId());

        $this->assertInstanceOf(
            Authorization::class,
            $object->setTransactionInitiator('test')
        );
        $this->assertEquals('test', $object->getTransactionInitiator());
    }
}
