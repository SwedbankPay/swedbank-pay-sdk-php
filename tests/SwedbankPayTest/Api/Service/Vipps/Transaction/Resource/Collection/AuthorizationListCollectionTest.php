<?php

namespace SwedbankPayTest\Api\Service\Vipps\Transaction\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Vipps\Transaction\Resource\Collection\AuthorizationListCollection;
use SwedbankPay\Api\Service\Vipps\Transaction\Resource\Collection\Item\AuthorizationListItem;

class AuthorizationListCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new AuthorizationListCollection();
        $item = new AuthorizationListItem();

        $this->assertInstanceOf(
            AuthorizationListCollection::class,
            $object->addItem($item)
        );
        $this->assertEquals(1, count($object->getItems()));

        foreach ($object->getItems() as $item) {
            $this->assertInstanceOf(AuthorizationListItem::class, $item);
        }

        $object->unsetItems();
        $this->assertEquals(0, count($object->getItems()));
    }
}
