<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionObjectInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Transaction;

class TransactionObjectTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionObject();
        $transaction = new Transaction();

        $this->assertInstanceOf(
            TransactionObjectInterface::class,
            $object->setTransaction($transaction)
        );
        $this->assertInstanceOf(Transaction::class, $object->getTransaction());
    }
}
