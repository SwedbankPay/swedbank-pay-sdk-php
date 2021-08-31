<?php

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Response\Authorization;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class AuthorizationTest extends TestCase
{
    public function testData()
    {
        $object = new Authorization();
        $transaction = new TransactionResource();

        $this->assertInstanceOf(
            Authorization::class,
            $object->setConsumer($transaction)
        );
        $this->assertInstanceOf(TransactionResourceInterface::class, $object->getConsumer());

        $this->assertInstanceOf(
            Authorization::class,
            $object->setLegalAddress($transaction)
        );
        $this->assertInstanceOf(TransactionResourceInterface::class, $object->getLegalAddress());

        $this->assertInstanceOf(
            Authorization::class,
            $object->setBillingAddress($transaction)
        );
        $this->assertInstanceOf(TransactionResourceInterface::class, $object->getBillingAddress());
    }
}
