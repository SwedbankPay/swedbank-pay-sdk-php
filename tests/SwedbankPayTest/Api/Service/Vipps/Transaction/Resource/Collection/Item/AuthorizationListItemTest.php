<?php

namespace SwedbankPayTest\Api\Service\Vipps\Transaction\Resource\Collection\Item;

use TestCase;
use SwedbankPay\Api\Service\Vipps\Transaction\Resource\Collection\Item\AuthorizationListItem;

class AuthorizationListItemTest extends TestCase
{
    public function testData()
    {
        $item = new AuthorizationListItem();

        $this->assertInstanceOf(
            AuthorizationListItem::class,
            $item->setMsisdn('test')
        );
        $this->assertEquals('test', $item->getMsisdn());

        $this->assertInstanceOf(
            AuthorizationListItem::class,
            $item->setVippsTransactionId('test')
        );
        $this->assertEquals('test', $item->getVippsTransactionId());
    }
}
