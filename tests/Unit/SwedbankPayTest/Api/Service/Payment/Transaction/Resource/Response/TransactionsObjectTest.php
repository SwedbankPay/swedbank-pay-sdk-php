<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionsObjectInterface;
//use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Transactions;

class TransactionsObjectTest extends TestCase
{
    public function testData()
    {
        $this->markTestSkipped('Object instance of TransactionsObjectInterface hasn\'t implemented yet');

        // @todo Object instance of TransactionsObjectInterface hasn't implemented yet
        $object = new TransactionsObject();
        $transactions = new Transactions();

        $this->assertInstanceOf(
            TransactionsObject::class,
            $object->setTransactions($transactions)
        );
        $this->assertInstanceOf(Transactions::class, $object->getTransactions());
    }
}
