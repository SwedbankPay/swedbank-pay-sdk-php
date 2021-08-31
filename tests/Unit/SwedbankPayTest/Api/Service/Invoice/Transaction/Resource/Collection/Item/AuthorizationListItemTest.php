<?php

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Collection\Item\AuthorizationListItem;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResource;

class AuthorizationListItemTest extends TestCase
{
    public function testData()
    {
        $item = new AuthorizationListItem();

        $this->assertInstanceOf(
            AuthorizationListItem::class,
            $item->setConsumer(new TransactionResource())
        );
        $this->assertInstanceOf(TransactionResourceInterface::class, $item->getConsumer());

        $this->assertInstanceOf(
            AuthorizationListItem::class,
            $item->setBillingAddress(new TransactionResource())
        );
        $this->assertInstanceOf(TransactionResourceInterface::class, $item->getBillingAddress());

        $this->assertInstanceOf(
            AuthorizationListItem::class,
            $item->setLegalAddress(new TransactionResource())
        );
        $this->assertInstanceOf(TransactionResourceInterface::class, $item->getLegalAddress());

    }
}
