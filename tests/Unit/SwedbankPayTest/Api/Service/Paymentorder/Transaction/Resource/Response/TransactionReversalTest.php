<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionReversal;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\ReversalInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Reversal;

class TransactionReversalTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionReversal();

        $this->assertInstanceOf(
            TransactionReversal::class,
            $object->setPayment('test')
        );
        $this->assertEquals('test', $object->getPayment());

        $reversal = new Reversal();
        $this->assertInstanceOf(
            TransactionReversal::class,
            $object->setReversal($reversal)
        );
        $this->assertInstanceOf(ReversalInterface::class, $object->getReversal());
    }
}