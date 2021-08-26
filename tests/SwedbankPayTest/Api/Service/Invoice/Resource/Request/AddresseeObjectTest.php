<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Resource\Request\AddresseeObject;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Addressee;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Data\AddresseeInterface;

class AddresseeObjectTest extends TestCase
{
    public function testData()
    {
        $object = new AddresseeObject();
        $address = new Addressee();

        $this->assertInstanceOf(
            AddresseeObject::class,
            $object->setAddressee($address)
        );
        $this->assertInstanceOf(AddresseeInterface::class, $object->getAddressee());
    }
}