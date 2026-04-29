<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\FinancialTransactionsListCollection;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\FinancialTransactions;

class FinancialTransactionsTest extends TestCase
{
    public function testData()
    {
        $object = new FinancialTransactions();

        $this->assertInstanceOf(
            FinancialTransactions::class,
            $object->setId('/psp/paymentorders/abc/financialtransactions')
        );
        $this->assertEquals('/psp/paymentorders/abc/financialtransactions', $object->getId());

        $this->assertNull($object->getFinancialTransactionsList());
    }

    public function testCollectionAccessor()
    {
        $object = new FinancialTransactions();
        $object->offsetSet(FinancialTransactions::FINANCIAL_TRANSACTIONS_LIST, new FinancialTransactionsListCollection());

        $list = $object->getFinancialTransactionsList();
        $this->assertInstanceOf(FinancialTransactionsListCollection::class, $list);
        $this->assertSame([], $list->getItems());
    }
}
