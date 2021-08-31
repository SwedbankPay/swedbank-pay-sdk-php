<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionCancel;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\CancellationInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Cancellation;

class TransactionCancelTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionCancel();

        $this->assertInstanceOf(
            TransactionCancel::class,
            $object->setPayment('test')
        );
        $this->assertEquals('test', $object->getPayment());

        $cancellation = new Cancellation();
        $this->assertInstanceOf(
            TransactionCancel::class,
            $object->setCancellation($cancellation)
        );
        $this->assertInstanceOf(CancellationInterface::class, $object->getCancellation());
    }
}