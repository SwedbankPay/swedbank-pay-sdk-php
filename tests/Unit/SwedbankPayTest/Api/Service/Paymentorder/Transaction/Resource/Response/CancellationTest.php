<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Cancellation;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\TransactionInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Transaction;

class CancellationTest extends TestCase
{
    public function testData()
    {
        $object = new Cancellation();

        $this->assertInstanceOf(
            Cancellation::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());

        $transaction = new Transaction();
        $this->assertInstanceOf(
            Cancellation::class,
            $object->setTransaction($transaction)
        );
        $this->assertInstanceOf(TransactionInterface::class, $object->getTransaction());
    }
}
