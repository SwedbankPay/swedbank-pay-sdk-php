<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Capture;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\TransactionInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Transaction;

class CaptureTest extends TestCase
{
    public function testData()
    {
        $object = new Capture();

        $this->assertInstanceOf(
            Capture::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());

        $transaction = new Transaction();
        $this->assertInstanceOf(
            Capture::class,
            $object->setTransaction($transaction)
        );
        $this->assertInstanceOf(TransactionInterface::class, $object->getTransaction());
    }
}
