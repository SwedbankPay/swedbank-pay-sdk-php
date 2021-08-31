<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\SalesObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\SalesInterface;
//use SwedbankPay\Api\Service\Swish\Transaction\Resource\Response\Sales;

class SalesObjectTest extends TestCase
{
    public function testData()
    {
        $this->markTestSkipped('Object instance of SalesInterface hasn\'t implemented yet');

        // @todo Object instance of SalesInterface hasn't implemented yet
        $object = new SalesObject();
        $sales = new Sales();

        $this->assertInstanceOf(
            SalesObject::class,
            $object->setSales($sales)
        );
        $this->assertInstanceOf(Sales::class, $object->getSales());
    }
}
