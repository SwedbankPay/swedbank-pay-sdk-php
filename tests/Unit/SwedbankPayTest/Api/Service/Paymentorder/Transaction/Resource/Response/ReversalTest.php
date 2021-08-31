<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Reversal;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\TransactionInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Transaction;

class ReversalTest extends TestCase
{
    public function testData()
    {
        $object = new Reversal();

        $this->assertInstanceOf(
            Reversal::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());

        $transaction = new Transaction();
        $this->assertInstanceOf(
            Reversal::class,
            $object->setTransaction($transaction)
        );
        $this->assertInstanceOf(TransactionInterface::class, $object->getTransaction());
    }
}
