<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Payment\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Resource\Response\Transactions;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;

class TransactionsTest extends TestCase
{
    public function testData()
    {
        $object = new Transactions();

        $this->assertInstanceOf(
            Transactions::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());

        $list = new TransactionListCollection();
        $this->assertInstanceOf(
            Transactions::class,
            $object->setTransactionList($list)
        );
        $this->assertInstanceOf(TransactionListCollection::class, $object->getTransactionList());
    }
}