<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Consumer\Resource\Request;

use SwedbankPay\Api\Service\Consumer\Resource\ConsumerNationalIdentifier;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerNationalIdentifierInterface;
use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\Request\InitiateConsumerSession;

class InitiateConsumerSessionTest extends TestCase
{
    public function testData()
    {
        $object = new InitiateConsumerSession();

        $this->assertInstanceOf(InitiateConsumerSession::class, $object->setEmail('test'));
        $this->assertEquals('test', $object->getEmail());

        $this->assertInstanceOf(InitiateConsumerSession::class, $object->setMsisdn('test'));
        $this->assertEquals('test', $object->getMsisdn());

        $this->assertInstanceOf(
            InitiateConsumerSession::class,
            $object->setConsumerCountryCode('test')
        );
        $this->assertEquals('test', $object->getConsumerCountryCode());

        $this->assertInstanceOf(
            InitiateConsumerSession::class,
            $object->setNationalIdentifier(new ConsumerNationalIdentifier())
        );
        $this->assertInstanceOf(ConsumerNationalIdentifierInterface::class, $object->getNationalIdentifier());
    }
}