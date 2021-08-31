<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Swish\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Swish\Transaction\Resource\Request\TransactionSale;
use TestCase;

class TransactionSaleTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionSale();

        $this->assertInstanceOf(
            TransactionSale::class,
            $object->setMsisdn('test')
        );
        $this->assertEquals('test', $object->getMsisdn());
    }
}
