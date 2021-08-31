<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Authorization;
use TestCase;
use SwedbankPay\Api\Service\Consumer\Resource\Data\ConsumerAddressInterface;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\ConsumerInterface;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Data\TransactionInterface;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Consumer;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Transaction;

class AuthorizationTest extends TestCase
{
    public function testData()
    {
        $object = new Authorization();

        $this->assertInstanceOf(Authorization::class, $object->setTransaction(new Transaction()));
        $this->assertInstanceOf(TransactionInterface::class, $object->getTransaction());

        $this->assertInstanceOf(Authorization::class, $object->setConsumer(new Consumer()));
        $this->assertInstanceOf(ConsumerInterface::class, $object->getConsumer());

        $this->assertInstanceOf(Authorization::class, $object->setLegalAddress(new ConsumerAddress()));
        $this->assertInstanceOf(ConsumerAddressInterface::class, $object->getLegalAddress());

        $this->assertInstanceOf(Authorization::class, $object->setBillingAddress(new ConsumerAddress()));
        $this->assertInstanceOf(ConsumerAddressInterface::class, $object->getBillingAddress());
    }
}
