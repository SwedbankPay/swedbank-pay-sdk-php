<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\TransactionListItem;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\ProblemInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Problem;
use SwedbankPay\Api\Service\Resource\Collection\OperationsCollection;

class TransactionListItemTest extends TestCase
{
    /**
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function testData()
    {
        $item = new TransactionListItem();

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setId('test')
        );
        $this->assertEquals('test', $item->getId());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setCreated('test')
        );
        $this->assertEquals('test', $item->getCreated());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setUpdated('test')
        );
        $this->assertEquals('test', $item->getUpdated());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setType('test')
        );
        $this->assertEquals('test', $item->getType());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setState('test')
        );
        $this->assertEquals('test', $item->getState());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setNumber(123)
        );
        $this->assertEquals(123, $item->getNumber());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setAmount(123)
        );
        $this->assertEquals(123, $item->getAmount());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setVatAmount(123)
        );
        $this->assertEquals(123, $item->getVatAmount());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setDescription('test')
        );
        $this->assertEquals('test', $item->getDescription());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setPayeeReference('test')
        );
        $this->assertEquals('test', $item->getPayeeReference());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setFailedReason('test')
        );
        $this->assertEquals('test', $item->getFailedReason());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setFailedActivityName('test')
        );
        $this->assertEquals('test', $item->getFailedActivityName());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setFailedErrorCode('test')
        );
        $this->assertEquals('test', $item->getFailedErrorCode());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setFailedErrorDescription('test')
        );
        $this->assertEquals('test', $item->getFailedErrorDescription());

        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setIsOperational(true)
        );
        $this->assertEquals(true, $item->getIsOperational());

        $problem = new Problem();
        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setProblem($problem)
        );
        $this->assertInstanceOf(ProblemInterface::class, $item->getProblem());

        $operations = new OperationsCollection();
        $this->assertInstanceOf(
            TransactionListItem::class,
            $item->setOperations($operations)
        );
        $this->assertInstanceOf(OperationsCollection::class, $item->getOperations());
    }
}
