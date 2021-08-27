<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\SaleObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\SaleObjectInterface;
use SwedbankPay\Api\Service\Swish\Transaction\Resource\Response\Sale;

class SaleObjectTest extends TestCase
{
    public function testData()
    {
        $object = new SaleObject();
        $sale = new Sale();

        $this->assertInstanceOf(
            SaleObjectInterface::class,
            $object->setSale($sale)
        );
        $this->assertInstanceOf(Sale::class, $object->getSale());
    }
}
