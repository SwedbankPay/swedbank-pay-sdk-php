<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Transaction;
use TestCase;

class TransactionTest extends TestCase
{
    public function testData()
    {
        $object = new Transaction();

        $this->assertInstanceOf(
            Transaction::class,
            $object->setActivity('test')
        );
        $this->assertEquals('test', $object->getActivity());
    }
}
